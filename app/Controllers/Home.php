<?php

namespace App\Controllers;

class Home extends BaseController
{

    /**
     * Home page
     * @return string
     */
    public function index(): string
    {
        $data = [
            'slug'   => 'home',
            'uri'    => '',
            'locale' => $this->request->getLocale(),
        ];
        return view('home', $data);
    }

    /**
     * About us page
     * @return string
     */
    public function aboutUs(): string
    {
        $data = [
            'slug'   => 'about-us',
            'uri'    => 'about-us',
            'locale' => $this->request->getLocale(),
        ];
        return view('about-us', $data);
    }

    /**
     * Contact us page
     * @return string
     */
    public function contactUs(): string
    {
        $data = [
            'slug'   => 'contact-us',
            'uri'    => 'contact-us',
            'locale' => $this->request->getLocale(),
        ];
        return view('contact-us', $data);
    }

}
