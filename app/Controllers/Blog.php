<?php

namespace App\Controllers;

class Blog extends BaseController
{

    /**
     * This is the main blog page
     * @return string
     */
    public function index(): string
    {
        $data = [
            'slug'   => 'blog',
            'uri'    => 'blog',
            'locale' => $this->request->getLocale(),
        ];
        return view('blog', $data);
    }

}