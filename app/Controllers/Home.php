<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;

class Home extends BaseController
{

    /**
     * This is the homepage
     * @return string
     */
    public function index(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'home',
            'locale' => $locale,
            'uri'    => ''
        ];
        return view('home', $data);
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
     * This is the services page
     * @return string
     */
    public function services(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'services',
            'locale' => $locale,
            'uri'    => 'services'
        ];
        return view('services', $data);
    }

    /**
     * This is the promotions page
     * @return string
     */
    public function promotions(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'promotions',
            'locale' => $locale,
            'uri'    => 'promotions'
        ];
        return view('promotions', $data);
    }

    /**
     * This is the contact us page
     * @return string
     */
    public function contactUs(): string
    {
        $locale = service('request')->getLocale();
        $data   = [
            'slug'   => 'contact-us',
            'locale' => $locale,
            'uri'    => 'contact-us'
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
        $category_id = getenv('WORDPRESS_LOCALE_' . strtoupper($locale));
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
        $post      = generateWordPressPage($blog_slug);
        $data      = [
            'slug'   => 'blog-view',
            'locale' => $locale,
            'uri'    => 'blog/view/?s=' . utf8_encode($blog_slug),
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
        // MAIN PAGES
        $main_pages = [
            ['/', '2025-01-01', 'monthly', '1.0'],
            ['/about-us', '2025-01-01', 'monthly', '0.8'],
            ['/contact-us', '2025-01-01', 'monthly', '0.8'],
            ['/blog', '2025-01-01', 'weekly', '0.6'],
            ['/terms-and-conditions', '2025-01-01', 'monthly', '0.5'],
            ['/privacy-policy', '2025-01-01', 'monthly', '0.5']
        ];
        $languages  = [
            '',
            '/en',
            '/th'
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
        // BLOG PAGES
        $blog_url           = getenv('BLOG_URL');
        $category_ids       = [
            getenv('WORDPRESS_LOCALE_EN') => '/en/blog/view/',
            getenv('WORDPRESS_LOCALE_TH') => '/th/blog/view/'
        ];
        foreach ($category_ids as $id => $path) {
            $url    = $blog_url . 'posts?context=embed&per_page=50&categories=' . $id;
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
                        'loc'        => base_url($path . $post['id']),
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
        $message = $this->request->getPost('message');
        $to      = getenv('CONTACT_FORM_EMAIL');
        $fr      = getenv('CONTACT_FORM_FROM');
        // Send the email
        $email   = Services::email();
        $email->setTo($to);
        $email->setFrom($fr);
        $email->setSubject('Contact Form Submission');
        $email->setMessage("Contact Form Submission\n\nName: $name\nEmail: $from\nPhone: $phone\nMessage: $message");
        if (!$email->send()) {
            return 'OK';
        }
        return lang('Contact.form.responses.error');
    }
}
