<?php

use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * Call cURL
 * @param string $url
 * @param string $method
 * @return array The array of headers and body
 */
function callWordPressCurl(string $url, string $method = 'GET'): array
{
    // cURL
    try {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        $response   = curl_exec($ch);
        $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $headers    = substr($response, 0, $headerSize);
        $body       = substr($response, $headerSize);
        curl_close($ch);
        return [
            'headers' => $headers,
            'body'    => json_decode($body, true)
        ];
    } catch (\Exception $e) {
        return [];
    }
}

/**
 * Strip tags and remove [...] from the excerpt
 * Please note that the word count is set at WordPress, theme's file, functions.php
 * @param string $excerpt
 * @return string
 */
function fixExcerpt(string $excerpt): string
{
    $excerpt = strip_tags($excerpt);
    return trim(str_replace('[&hellip;]', '', $excerpt));
}

/**
 * Format blog posts
 * @param $url_part
 * @return array
 */
function retrieveWordPressPosts($url_part): array
{
    $blog_url    = getenv('WORDPRESS_URL');
    $url         = $blog_url . $url_part;
    $response    = callWordPressCurl($url);
    $posts       = $response['body'];
    $headers     = $response['headers'];
    $array_posts = [];
    $media_list  = [];
    $tag_list    = [];
    $author_list = [];
    if (isset($posts[0])) {
        // POSTS
        $media   = [];
        $tags    = [];
        $authors = [];
        foreach ($posts as $post) {
            $array_posts[] = [
                'id'             => $post['id'],
                'title'          => $post['title']['rendered'],
                'slug'           => $post['slug'],
                'author'         => $post['author'],
                'date'           => $post['date_gmt'],
                'excerpt'        => fixExcerpt($post['excerpt']['rendered']),
                'tag_ids'        => $post['tags'],
                'featured_image' => $post['featured_media'] ?? null,
            ];
            if (!empty($post['tags'])) {
                foreach ($post['tags'] as $tag) {
                    $tags[] = $tag;
                }
            }
            if (!empty($post['featured_media'])) {
                $media[] = $post['featured_media'];
            }
            $authors[] = $post['author'];
        }
        // MEDIA
        $media   = array_unique($media);
        if (!empty($media)) {
            log_message('debug', print_r($media, true));
            $response  = callWordPressCurl($blog_url . 'media?per_page=50&include=' . implode(',', $media));
            $raw_media = $response['body'];
            log_message('debug', print_r($raw_media, true));
            foreach ($raw_media as $media_item) {
                // Todo: Need to ensure the medium size is ok, maybe... 500x500 minimum?
                $media_list[$media_item['id']] = $media_item['media_details']['sizes']['medium']['source_url'] ?? $media_item['media_details']['sizes']['full']['source_url'];
                log_message('debug', $media_item['id']);
                log_message('debug', print_r($media_list[$media_item['id']], true));
            }
        }
        // TAGS
        $tags    = array_unique($tags);
        if (!empty($tags)) {
            $tag_count = count($tags);
            $per_page  = 30;
            $num_call  = ceil($tag_count/$per_page);
            for ($c = 0; $c < $num_call; $c++) {
                $start              = $c * $per_page;
                $tags_for_this_page = array_slice($tags, $start, $per_page);
                $response = callWordPressCurl($blog_url . 'tags?per_page=' . $per_page . '&include=' . implode(',', $tags_for_this_page));
                $raw_tags = $response['body'] ?? [];
                foreach ($raw_tags as $tag) {
                    if (isset($tag['id'], $tag['slug'])) {
                        $tag_list[$tag['id']] = $tag['slug'];
                    }
                }
            }
        }
        // AUTHORS
        $authors = array_unique($authors);
        if (!empty($authors)) {
            $response    = callWordPressCurl($blog_url . 'users?include=' . implode(',', $authors));
            $raw_authors = $response['body'];
            foreach ($raw_authors as $author) {
                $author_list[$author['id']] = $author['name'];
            }
        }
    }
    $header_fields = explode("\n", $headers);
    $total_posts   = 0;
    $total_pages   = 0;
    foreach ($header_fields as $field) {
        $data = explode(':', $field);
        if ('x-wp-total' == strtolower($data[0])) {
            $total_posts = $data[1];
        }
        if ('x-wp-totalpages' == strtolower($data[0])) {
            $total_pages = $data[1];
        }
    }
    return [
        'posts'       => $array_posts,
        'media'       => $media_list,
        'tags'        => $tag_list,
        'authors'     => $author_list,
        'total_pages' => $total_pages,
        'total_posts' => $total_posts,
    ];
}

/**
 * @param string $slug
 * @return array
 */
function generateWordPressPost(string $slug): array
{
    $slug      = strtolower($slug);
    $url       = getenv('WORDPRESS_URL') . 'posts/?slug=' . $slug;
    $response  = callWordPressCurl($url);
    $post_data = $response['body'][0] ?? null;
    if (!$post_data) {
        throw new PageNotFoundException('Cannot find the post with code ' . $slug);
    }
    $media     = [];
    $tags      = [];
    if (!empty($post_data['featured_media']) && 0 < $post_data['featured_media']) {
        $media = callWordPressCurl(getenv('WORDPRESS_URL') . 'media/' . $post_data['featured_media']);
        $media = $media['body'] ?? [];
    }
    if (!empty($post_data['tags'])) {
        $tag_ids = implode(',', $post_data['tags']);
        $tags    = callWordPressCurl(getenv('WORDPRESS_URL') . 'tags/?per_page=' . count($post_data['tags']) . '&include=' . $tag_ids);
        $tags    = $tags['body'] ?? [];
    }
    // AUTHOR
    $author_id = $post_data['author'];
    $author    = callWordPressCurl(getenv('WORDPRESS_URL') . 'users/' . $author_id);
    $author    = $author['body'] ?? [];
    return [
        'navbar_class'     => 'position-absolute bg-light',
        'title'            => $post_data['title']['rendered'],
        'post_data'        => $post_data,
        'media'             => $media,
        'tags'             => $tags,
        'author'           => $author,
    ];
}

/**
 * @param string $slug
 * @param bool $suppress_not_found
 * @return array
 */
function generateWordPressPage(string $slug, bool $suppress_not_found = false): array
{
    $slug      = strtolower($slug);
    $url       = getenv('WORDPRESS_URL') . 'pages/?slug=' . $slug;
    $response  = callWordPressCurl($url);
    $page_data = $response['body'][0] ?? null;
    if (!$page_data) {
        if ($suppress_not_found) {
            return [];
        }
        throw new PageNotFoundException('Cannot find the post with code ' . $slug);
    }
    $media     = [];
    if (0 < $page_data['featured_media']) {
        $media = callWordPressCurl(getenv('WORDPRESS_URL') . 'media/' . $page_data['featured_media']);
        $media = $media['body'] ?? [];
    }
    return [
        'title'          => $page_data['title']['rendered'],
        'content'        => $page_data['content']['rendered'],
        'featured_image' => $media['media_details']['sizes']['full']['source_url'] ?? null,
        'updated'        => $page_data['modified_gmt'],
    ];
}

/**
 * Get the pages
 * @param array $slugs
 * @return array
 */
function generateWordPressPages(array $slugs): array
{
    $slug         = implode(',', $slugs);
    $url          = getenv('WORDPRESS_URL') . 'pages/?slug=' . $slug;
    $response     = callWordPressCurl($url);
    $pages_data   = $response['body'] ?? [];
    $result_pages = [];
    $media_ids    = [];
    $result_media = [];
    foreach ($pages_data as $page_data) {
        $result_pages[$page_data['slug']] = $page_data;
        if (0 < $page_data['featured_media']) {
            $media_ids[] = $page_data['featured_media'];
        }
    }
    if (!empty($media_ids)) {
        $media_string = implode(',', $media_ids);
        $media        = callWordPressCurl(getenv('WORDPRESS_URL') . 'media?include=' . $media_string . '&per_page=' . count($media_ids));
        $media        = $media['body'] ?? [];
        foreach ($media as $item) {
            foreach ($item['media_details']['sizes'] as $size => $details) {
                $result_media[$item['id']][$size] = $details['source_url'] ?? null;
            }
        }
    }
    foreach ($result_pages as $slug => $page_data) {
        if (0 < $page_data['featured_media'] && isset($result_media[$page_data['featured_media']])) {
            $result_pages[$slug]['featured_media_files'] = $result_media[$page_data['featured_media']];
        }
    }
    return $result_pages;
}

/**
 * @param DateTime $date
 * @return string
 */
function formatDateTimeThai(DateTime $date): string
{
    $time  = $date->format('H:i') . 'น.';
    $year  = intval($date->format('Y')) + 543;
    $month = intval($date->format('m')) - 1;
    $date  = intval($date->format('d'));
    $months = [
        'ม.ค.',
        'ก.พ.',
        'มี.ค.',
        'เม.ย.',
        'พ.ค.',
        'มิ.ย.',
        'ก.ค.',
        'ส.ค.',
        'ก.ย.',
        'ต.ค.',
        'พ.ย.',
        'ธ.ค.',
    ];
    $month = $months[$month];
    return "$date $month $year $time";
}

/**
 * @param DateTime $date
 * @return string
 */
function formatDateTimeSpanish(DateTime $date): string
{
    $time  = $date->format('h:i a');
    $year  = intval($date->format('Y'));
    $month = intval($date->format('m')) - 1;
    $date  = intval($date->format('d'));
    $months = [
        'Ene.',
        'Feb.',
        'Mar.',
        'Abr.',
        'May.',
        'Jun.',
        'Jul.',
        'Ago.',
        'Set.',
        'Oct.',
        'Nov.',
        'Dic.'
    ];
    $month = $months[$month];
    return "$date $month $year $time";
}

/**
 * @param string $date
 * @param string $locale
 * @return string
 * @throws Exception
 */
function format_post_date(string $date, string $locale): string
{
    try {
        $date = new DateTime($date, new DateTimeZone('UTC'));
        $date->setTimezone(new DateTimeZone('Pacific/Auckland'));
        if ('th' == $locale) {
            return formatDateTimeThai($date);
        } else if ('es' == $locale) {
            return formatDateTimeSpanish($date);
        } else if ('zh' == $locale) {
            return $date->format('Y年m月d日 H:i');
        }
        return $date->format('d M Y h:i a');
    } catch (Exception $e) {
        log_message('error', $e->getMessage());
        return $date->format('d M Y h:i a');
    }
}