<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <?php
    $meta_title   = ('blog-view' == $slug ? $title : lang('Theme.pages.' . $slug)) . ' | ' . lang('Theme.website-name');
    $company_logo = 'company-logo.png';
    $favicon_file = 'favicon.png';
    $meta_image   = ($post['media']['media_details']['sizes']['full']['source_url'] ?? $company_logo);
    ?>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= $meta_title ?></title>
    <meta name="description" content="<?= ('blog-view' == $slug ? $title : lang('Seo.' . $slug . '.description')) ?>">
    <meta name="keywords" content="<?= ('blog-view' == $slug ? $title : lang('Seo.' . $slug . '.keywords')) ?>">
    <meta name="author" content="<?= lang('Theme.website-name') ?>">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="<?= $meta_title ?>">
    <meta property="og:description" content="<?= ('blog-view' == $slug ? $title : lang('Seo.' . $slug . '.description')) ?>">
    <meta property="og:image" content="<?= $meta_image ?>">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="<?= (in_array($slug, ['blog-view', 'blog']) ? 'article' : 'website') ?>">
    <!-- Favicons -->
    <link href="<?= $favicon_file ?>" rel="icon">
    <link href="<?= $favicon_file ?>" rel="apple-touch-icon">
    <!-- Link Languages -->
    <?php if ('blog-view' != $slug) : ?>
        <link rel="alternate" hreflang="en" href="<?= base_url('en/' . $uri) ?>">
        <link rel="alternate" hreflang="th" href="<?= base_url('th/' . $uri) ?>">
        <link rel="alternate" hreflang="es" href="<?= base_url('es/' . $uri) ?>">
        <link rel="alternate" hreflang="zh" href="<?= base_url('zh/' . $uri) ?>">
        <link rel="alternate" hreflang="x-default" href="<?= base_url($uri) ?>">
    <?php endif; ?>
    <link rel="canonical" href="<?= current_url() ?>">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="<?= base_url('/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/vendor/aos/aos.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/vendor/swiper/swiper-bundle.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('/vendor/glightbox/css/glightbox.min.css') ?>" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="<?= base_url('/strategy-theme/css/main.css') ?>" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Strategy
    * Template URL: https://bootstrapmade.com/strategy-bootstrap-agency-template/
    * Updated: Jun 06 2025 with Bootstrap v5.3.6
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
        <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- <img src="<?= base_url('/img/logo.webp') ?>" alt="<?= lang('Theme.website-name') ?>"> -->
            <h1 class="sitename"><?= lang('Theme.website-name') ?></h1>
        </a>
        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= base_url($locale) ?>"><?= lang('Theme.pages.home') ?></a></li>
                <li><a href="<?= base_url($locale . '/about-us') ?>"><?= lang('Theme.pages.about-us') ?></a></li>
                <li><a href="<?= base_url($locale . '/contact-us') ?>"><?= lang('Theme.pages.contact-us') ?></a></li>
                <li><a href="<?= base_url($locale . '/blog') ?>"><?= lang('Theme.pages.blog') ?></a></li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
        <?php if ('en' == $locale) : ?>
        <a class="btn-getstarted" href="<?= base_url('th/' . $uri) ?>">ภาษาไทย</a>
        <?php else: ?>
        <a class="btn-getstarted" href="<?= base_url('en/' . $uri) ?>">English</a>
        <?php endif; ?>
    </div>
</header>
<main class="main">
    <?= $this->renderSection('content') ?>
</main>
<footer id="footer" class="footer">
    <div class="container footer-top">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-about">
                <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center">
                    <span class="sitename"><?= lang('Theme.website-name') ?></span>
                </a>
                <p><?= lang('Theme.footer-paragraph') ?></p>
                <div class="social-links d-flex mt-4">
                    <a href=""><i class="bi bi-twitter-x"></i></a>
                    <a href=""><i class="bi bi-facebook"></i></a>
                    <a href=""><i class="bi bi-instagram"></i></a>
                    <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-2 col-6 footer-links">
                <h4><?= lang('Theme.footer-links') ?></h4>
                <ul>
                    <li><a href="<?= base_url($locale) ?>"><?= lang('Theme.pages.home') ?></a></li>
                    <li><a href="<?= base_url($locale . '/about-us') ?>"><?= lang('Theme.pages.about-us') ?></a></li>
                    <li><a href="<?= base_url($locale . '/contact-us') ?>"><?= lang('Theme.pages.contact-us') ?></a></li>
                    <li><a href="<?= base_url($locale . '/blog') ?>"><?= lang('Theme.pages.blog') ?></a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6 footer-links"></div>
            <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start"></div>
        </div>
    </div>
    <div class="container copyright text-center mt-4">
        <p>
            &copy; <?= date('Y') ?> | All Rights Reserved | <?= lang('Theme.company-name') ?> |
            <a href="<?= base_url($locale . '/terms-and-conditions') ?>"><?= lang('Theme.pages.terms-and-conditions') ?></a> |
            <a href="<?= base_url($locale . '/privacy-policy') ?>"><?= lang('Theme.pages.privacy-policy') ?></a>
        </p>
    </div>
</footer>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="<?= base_url('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
<script src="<?= base_url('/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<!-- Main JS File -->
<script src="<?= base_url('/strategy-theme/js/main.js') ?>"></script>
</body>
</html>