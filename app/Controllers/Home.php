<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Home extends BaseController
{

    private $opening_hours = [
        'MON' => ['08:00', '22:00'],
        'TUE' => ['08:00', '22:00'],
        'WED' => ['08:00', '22:00'],
        'THU' => ['08:00', '22:00'],
        'FRI' => ['08:00', '22:00'],
        'SAT' => ['08:00', '22:00'],
        'SUN' => ['08:00', '22:00']
    ];

    /**
     * This is the homepage
     * @return string
     */
    public function index(): string
    {
        helper('wordpress');
        $locale          = service('request')->getLocale();
        // BLOG ITEMS - FEATURED SERVICES (3x)
        $limit           = getenv('WORDPRESS_SERVICE_HOME_LIMIT');
        $category_id     = getenv('WORDPRESS_FEATURE_SERVICE_' . strtoupper($locale));
        $services        = retrieveWordPressPosts("posts?per_page={$limit}&categories={$category_id}&order=asc");
        // BLOG ITEMS - FEATURED STAFF (3x)
        $category_id     = getenv('WORDPRESS_FEATURE_STAFF_' . strtoupper($locale));
        $staff           = retrieveWordPressPosts("posts?per_page={$limit}&categories={$category_id}&order=desc&orderby=date");
        // PAGE ITEMS - PROMOTIONS
        $slugs           = ['promotion-popup-' . $locale, 'promotion-popup-en', 'promotional-hero-' . $locale, 'promotional-hero-en', 'permanent-promotion-1-' . $locale, 'permanent-promotion-1-en', 'permanent-promotion-2-' . $locale, 'permanent-promotion-2-en'];
        $slugs_dedupe    = array_unique($slugs);
        $wp_pages        = generateWordPressPages($slugs_dedupe);
        $promotion_popup = $wp_pages['promotion-popup-' . $locale] ?? $wp_pages['promotion-popup-en'] ?? null;
        $promotion_hero  = $wp_pages['promotional-hero-' . $locale] ?? $wp_pages['promotional-hero-en'] ?? null;
        // PROMOTIONS
        $category_id     = getenv('WORDPRESS_FEATURE_PROMOTION_' . strtoupper($locale));
        $permanent_promo = retrieveWordPressPosts("posts?per_page={$limit}&categories={$category_id}&order=desc&orderby=date");
        $data            = [
            'slug'            => 'home',
            'locale'          => $locale,
            'uri'             => '',
            'services'        => $services,
            'staff'           => $staff,
            'promotion_popup' => $promotion_popup,
            'promotion_hero'  => $promotion_hero,
            'promotions'      => $permanent_promo,
            'opening_hours'   => $this->opening_hours,
        ];
        return view('home', $data);
    }

    /**
     * Under Construction
     * @return string
     */
    public function under_construction(): string
    {
        return view('under_construction');
    }

    /**
     * This is the about us page
     * @return string
     */
    public function aboutUs(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'about-us',
            'locale' => $locale,
            'uri'    => 'about-us'
        ];
        return view('about-us', $data);
    }

    /**
     * This is the service page
     * @return string
     */
    public function services(): string
    {
        helper('wordpress');
        $locale      = service('request')->getLocale();
        $category_id = getenv('WORDPRESS_SERVICE_' . strtoupper($locale));
        $services    = retrieveWordPressPosts("posts?per_page=20&categories={$category_id}&orderby=title&order=asc");
        $data        = [
            'slug'     => 'services',
            'locale'   => $locale,
            'uri'      => 'services',
            'services' => $services
        ];
        return view('services', $data);
    }

    /**
     * This is the service view page
     * @return string
     */
    public function serviceView(): string
    {
        helper('wordpress');
        $service_slug = $this->request->getVar('q');
        $locale       = service('request')->getLocale();
        $post         = generateWordPressPost($service_slug);
        $data         = [
            'slug'   => 'service-view',
            'locale' => $locale,
            'uri'    => 'services/view/?q=' . urlencode($service_slug),
            'post'   => $post,
            'title'  => $post['title']
        ];
        return view('service-view', $data);
    }

    /**
     * This is the promotion page
     * @return string
     */
    public function promotions(): string
    {
        helper('wordpress');
        $locale      = service('request')->getLocale();
        $page        = 1;
        $limit       = getenv('WORDPRESS_PAGE_LIMIT');
        $category_id = getenv('WORDPRESS_PROMOTION_' . strtoupper($locale));
        $promotions  = retrieveWordPressPosts("posts?page={$page}&per_page={$limit}&categories={$category_id}");
        $data        = [
            'slug'       => 'promotions',
            'locale'     => $locale,
            'uri'        => 'promotions',
            'promotions' => $promotions,
            'page'       => $page
        ];
        return view('promotions', $data);
    }

    /**
     * This is the service view page
     * @return string
     */
    public function promotionView(): string
    {
        helper('wordpress');
        $service_slug = $this->request->getVar('q');
        $locale       = service('request')->getLocale();
        $post         = generateWordPressPost($service_slug);
        $data         = [
            'slug'   => 'promotion-view',
            'locale' => $locale,
            'uri'    => 'promotions/view/?q=' . urlencode($service_slug),
            'post'   => $post,
            'title'  => $post['title']
        ];
        return view('promotion-view', $data);
    }

    /**
     * This is the contact us page
     * @return string
     */
    public function contactUs(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'          => 'contact-us',
            'locale'        => $locale,
            'uri'           => 'contact-us',
            'opening_hours' => $this->opening_hours,
        ];
        return view('contact-us', $data);
    }

    /**
     * This is the terms and conditions page
     * @return string
     */
    public function termsAndConditions(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'terms-and-conditions',
            'locale' => $locale,
            'uri'    => 'terms-and-conditions'
        ];
        return view('terms-and-conditions', $data);
    }

    /**
     * This is the privacy policy page
     * @return string
     */
    public function privacyPolicy(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'privacy-policy',
            'locale' => $locale,
            'uri'    => 'privacy-policy'
        ];
        return view('privacy-policy', $data);
    }

    /**
     * This is the blog page
     * @return string
     */
    public function blog(): string
    {
        helper('wordpress');
        $locale       = service('request')->getLocale();
        $page         = $this->request->getVar('p');
        $page         = (empty($page)) ? 1 : $page;
        $limit        = getenv('WORDPRESS_PAGE_LIMIT');
        $tag          = $this->request->getVar('tag');
        $query        = $this->request->getVar('q');
        $query_string = '';
        $mode         = 'list';
        $term         = '';
        if (!empty($query)) {
            $query_string = '&search=' . $query;
            $mode         = 'search';
            $term         = $query;
        } else if (!empty($tag)) {
            $query_string = '&tags=' . $tag;
            $mode         = 'tag';
            $term         = $tag;
        }
        $category_id = getenv('WORDPRESS_BLOG_' . strtoupper($locale));
        $posts  = retrieveWordPressPosts("posts?page={$page}&per_page={$limit}&categories={$category_id}{$query_string}");
        $data   = [
            'slug'   => 'blog',
            'locale' => $locale,
            'uri'    => 'blog',
            'posts'  => $posts,
            'mode'   => $mode,
            'term'   => $term,
            'page'   => $page
        ];
        return view('blog-list', $data);
    }

    /**
     * This is the blog view page
     * @return string
     */
    public function blogView(): string
    {
        helper('wordpress');
        $blog_slug = $this->request->getVar('s');
        $locale    = service('request')->getLocale();
        $post      = generateWordPressPost($blog_slug);
        $data      = [
            'slug'   => 'blog-view',
            'locale' => $locale,
            'uri'    => 'blog/view/?s=' . urlencode($blog_slug),
            'post'   => $post,
            'title'  => $post['title']
        ];
        return view('blog-view', $data);
    }

    /**
     * Generate sitemap.xml
     * @return ResponseInterface
     */
    public function sitemap(): ResponseInterface
    {
        log_message('debug', 'sitemap');
        // MAIN PAGES
        $main_pages = [
            ['/', '2025-09-15', 'monthly', '1.0'],
            ['/about-us', '2025-09-15', 'monthly', '0.8'],
            ['/contact-us', '2025-09-15', 'monthly', '0.8'],
            ['/services', '2025-09-15', 'weekly', '0.8'], // need WP
            ['/promotions', '2025-09-15', 'weekly', '0.8'],
            ['/blog', '2025-09-15', 'weekly', '0.6'], // need WP
        ];
        $languages  = [
            '',
            '/en',
            '/es',
            '/ja',
            '/zh'
        ];
        $xml        = [];
        foreach ($main_pages as $page) {
            foreach ($languages as $lang) {
                $xml[] = [
                    'loc'        => base_url($lang . $page[0]),
                    'lastmod'    => $page[1],
                    'changefreq' => $page[2],
                    'priority'   => $page[3],
                ];
            }
        }
        $blog_url           = getenv('WORDPRESS_URL');
        // SERVICES PAGES
        $services_id        = [
            getenv('WORDPRESS_SERVICE_EN') => '/en/services/view?q=',
            getenv('WORDPRESS_SERVICE_ES') => '/es/services/view?q=',
            getenv('WORDPRESS_SERVICE_JA') => '/ja/services/view?q=',
            getenv('WORDPRESS_SERVICE_ZH') => '/zh/services/view?q='
        ];
        foreach ($services_id as $id => $path) {
            $url    = $blog_url . 'posts?context=embed&per_page=10&categories=' . $id;
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $response   = curl_exec($ch);
                $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $body       = substr($response, $headerSize);
                $posts      = json_decode($body, true);
                foreach ($posts as $post) {
                    $published = strtotime(substr(@$post['date'], 0, 10));
                    $xml[]     = [
                        'loc'        => base_url($path . $post['slug']),
                        'lastmod'    => date('Y-m-d', $published),
                        'changefreq' => 'monthly',
                        'priority'   => '0.7',
                    ];
                }
                curl_close($ch);
            } catch (\Exception $e) {
                continue;
            }
        }
        // PROMOTIONS PAGES
        $promotion_ids        = [
            getenv('WORDPRESS_PROMOTION_EN') => '/en/promotions/view?q=',
            getenv('WORDPRESS_PROMOTION_ES') => '/es/promotions/view?q=',
            getenv('WORDPRESS_PROMOTION_JA') => '/ja/promotions/view?q=',
            getenv('WORDPRESS_PROMOTION_ZH') => '/zh/promotions/view?q='
        ];
        foreach ($promotion_ids as $id => $path) {
            $url    = $blog_url . 'posts?context=embed&per_page=10&categories=' . $id;
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $response   = curl_exec($ch);
                $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $body       = substr($response, $headerSize);
                $posts      = json_decode($body, true);
                foreach ($posts as $post) {
                    $published = strtotime(substr(@$post['date'], 0, 10));
                    $xml[]     = [
                        'loc'        => base_url($path . $post['slug']),
                        'lastmod'    => date('Y-m-d', $published),
                        'changefreq' => 'monthly',
                        'priority'   => '0.7',
                    ];
                }
                curl_close($ch);
            } catch (\Exception $e) {
                continue;
            }
        }
        // BLOG PAGES
        $category_ids       = [
            getenv('WORDPRESS_BLOG_EN') => '/en/blog/view/?s=',
            getenv('WORDPRESS_BLOG_ES') => '/es/blog/view/?s=',
            getenv('WORDPRESS_BLOG_JA') => '/ja/blog/view/?s=',
            getenv('WORDPRESS_BLOG_ZH') => '/zh/blog/view/?s='
        ];
        foreach ($category_ids as $id => $path) {
            $url    = $blog_url . 'posts?context=embed&per_page=10&categories=' . $id;
            try {
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_HEADER, true);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
                $response   = curl_exec($ch);
                $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                $body       = substr($response, $headerSize);
                $posts      = json_decode($body, true);
                foreach ($posts as $post) {
                    $published = strtotime(substr(@$post['date'], 0, 10));
                    $age       = (time() - $published) / 86400;
                    $priority  = 0.5;
                    if ($age < 180) {
                        $priority = 0.7;
                    } elseif ($age < 730) { // 2 years
                        $priority = 0.6;
                    }
                    $xml[]     = [
                        'loc'        => base_url($path . $post['slug']),
                        'lastmod'    => date('Y-m-d', $published),
                        'changefreq' => 'monthly',
                        'priority'   => $priority,
                    ];
                }
                curl_close($ch);
            } catch (\Exception $e) {
                continue;
            }
        }
        $final_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml">';
        foreach ($xml as $item) {
            $final_xml .= '<url>';
            foreach ($item as $key => $value) {
                $final_xml .= '<' . $key . '>' . $value . '</' . $key . '>';
            }
            $final_xml .= '</url>';
        }
        $final_xml .= '</urlset>';
        return $this->response->setXML($final_xml);
    }

    /**
     * This is the script to send the message to the email address
     * @return string
     */
    public function contactUsScript(): string
    {
        $name    = $this->request->getPost('name');
        $from    = $this->request->getPost('email');
        $phone   = $this->request->getPost('phone');
        $subject   = $this->request->getPost('subject');
        $message = $this->request->getPost('message');
        $to      = getenv('CONTACT_FORM_EMAIL');
        $fr      = getenv('CONTACT_FORM_FROM');
        // Send the email
        $email   = Services::email();
        $email->setTo($to);
        $email->setFrom($fr);
        $email->setSubject('[WEBSITE] Contact Form Submission' . ($subject ? ' - ' . $subject : ''));
        $email->setMessage("Contact Form Submission\n\nSubject: $subject\nName: $name\nEmail: $from\nPhone: $phone\nMessage: $message");
        if (!$email->send()) {
            return 'OK';
        }
        return lang('Contact.form.responses.error');
    }

    private function verifyWP(): string
    {
        // call WordPress
        helper('wordpress');
        $url  = getenv('WORDPRESS_URL');
        $data = [];
        $data['locale'] = service('request')->getLocale();
        $data['slug']   = 'verify-wp';
        $data['uri']    = 'verify-wp';
        // PAGES
        $data['pages'] = generateWordPressPages([
            'promotion-popup-en',
            'promotion-popup-es',
            'promotion-popup-ja',
            'promotion-popup-zh',
            'promotional-hero-en',
            'promotional-hero-es',
            'promotional-hero-ja',
            'promotional-hero-zh',
        ]);
        $categories = callWordPressCurl($url . 'categories?orderby=name&order=asc&per_page=100');
        $category_structure = $categories['body'];
        foreach ($category_structure as $category) {
            $data['categories'][$category['id']] = $category;
        }
        return view('verify-wp', $data);
    }
}
