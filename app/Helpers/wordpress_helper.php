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
                'date'           => $post['date'],
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
            $response  = callWordPressCurl($blog_url . 'media?per_page=50&include=' . implode(',', $media));
            $raw_media = $response['body'];
            foreach ($raw_media as $media_item) {
                // Todo: Need to ensure the medium size is ok, maybe... 500x500 minimum?
                $media_list[$media_item['id']] = $media_item['media_details']['sizes']['medium']['source_url'] ?? $media_item['media_details']['sizes']['full']['source_url'];
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
 * @return array
 */
function generateWordPressPage(string $slug): array
{
    $slug      = strtolower($slug);
    $url       = getenv('WORDPRESS_URL') . 'pages/?slug=' . $slug;
    $response  = callWordPressCurl($url);
    $page_data = $response['body'][0] ?? null;
    if (!$page_data) {
        throw new PageNotFoundException('Cannot find the post with code ' . $slug);
    }
    return [
        'title'   => $page_data['title']['rendered'],
        'content' => $page_data['content']['rendered'],
        'updated' => $page_data['modified_gmt'],
    ];
}

/**
 * @param string $date
 * @param string $locale
 * @return string
 */
function format_post_date(string $date, string $locale): string
{
    $date = substr($date, 0, 10);
    if ('en' == $locale) {
        return date('F j, Y', strtotime($date));
    }
    $yy = substr($date, 0, 4);
    $mm = substr($date, 5, 2);
    $dd = substr($date, 8, 2);
    if ('th' == $locale) {
        $months = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
        $yy += 543;
        $mm = $months[$mm-1];
        $dd = intval($dd);
        return "$dd $mm $yy";
    }
    return $date;
}