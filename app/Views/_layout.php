<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <?php
    $meta_title   = ('blog-view' == $slug ? $title : lang('Theme.pages.' . $slug)) . ' | ' . lang('Theme.website-name');
    $company_logo = base_url('skythai-logo.jpg');
    $favicon_file = base_url('favicon.png');
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
        <link rel="alternate" hreflang="es" href="<?= base_url('es/' . $uri) ?>">
        <link rel="alternate" hreflang="ja" href="<?= base_url('ja/' . $uri) ?>">
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
    <link href="<?= base_url('/vendor/flag-icon/flags.min.css') ?>" rel="stylesheet" />
    <!-- Main CSS File -->
    <link href="<?= base_url('/assets/css/main.css') ?>" rel="stylesheet">
    <!-- =======================================================
    * Template Name: Clinic
    * Template URL: https://bootstrapmade.com/clinic-bootstrap-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<body>
<?php
$nav = [
    ['home', base_url($locale), lang('Theme.pages.home')],
    ['about-us', base_url($locale . '/about-us'), lang('Theme.pages.about-us')],
    ['services', base_url($locale . '/services'), lang('Theme.pages.services')],
    ['promotions', base_url($locale . '/promotions'), lang('Theme.pages.promotions')],
    ['blog', base_url($locale . '/blog'), lang('Theme.pages.blog')],
    ['locales', '', ''],
    ['contact-us', base_url($locale . '/contact-us'), '<b><span class="bi bi-telephone"></span>&nbsp;' . lang('Theme.pages.contact-us') . '</b>'],
];
$locales = ['en', 'es', 'ja', 'zh'];
$flag    = ['nz', 'es', 'jp', 'cn'];
$lang_uri = $uri;
if ('blog-view' == $slug) {$lang_uri = 'blog';}
?>
<header id="header" class="header fixed-top">
    <div class="topbar d-flex align-items-center dark-background">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-bookmark-check-fill d-flex align-items-center"><a href="<?= getenv('BOOK_NOW_LINK') ?>">BOOK NOW</a></i>
                <i class="bi bi-phone d-flex align-items-center ms-4"><a href="tel:<?= getenv('WEB_TELEPHONE_LINK') ?>"><?= getenv('WEB_TELEPHONE_NUMBER') ?></a></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <?php foreach ($locales as $i => $item) : ?>
                    <a href="<?= base_url($item . '/' . $lang_uri) ?>"><i class="fi fi-<?= $flag[$i] ?>"></i></a>
                <?php endforeach; ?>
            </div>
        </div>
    </div><!-- End Top Bar -->
    <div class="branding d-flex align-items-cente">
        <div class="container position-relative d-flex align-items-center justify-content-between">
            <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center">
                <img src="<?= $company_logo ?>" alt="<?= lang('Theme.website-name') ?>">
                <h1 class="sitename"><?= lang('Theme.website-name') ?></h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <?php foreach ($nav as $item) : ?>
                        <?php if ('locales' == $item[0]) : ?>
                            <li class="dropdown">
                                <a href="#"><span><span class="bi bi-globe"></span> <?= lang('Theme.locales.label') ?></span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <?php foreach ($locales as $i => $item) : ?>
                                        <li><a href="<?= base_url($item . '/' . $lang_uri) ?>"><?= lang('Theme.locales.' . $item) ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li><a href="<?= $item[1] ?>" <?= ($slug == $item[0] ? 'class="active"' : '') ?>><?= $item[2] ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </div>
</header>
<main class="main">
    <?= $this->renderSection('content') ?>
</main>
<footer id="footer" class="footer-16 footer position-relative">
    <div class="container">
        <div class="footer-main" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-start">
                <div class="col-lg-5">
                    <div class="brand-section">
                        <a href="<?= base_url($locale) ?>" class="logo d-flex align-items-center mb-4">
                            <span class="sitename"><?= lang('Theme.website-name') ?></span>
                        </a>
                        <p class="brand-description"><?= lang('Theme.footer-paragraph') ?></p>
                        <div class="contact-info mt-5">
                            <div class="contact-item">
                                <i class="bi bi-geo-alt"></i>
                                <span><?= getenv('WEB_STORE_ADDRESS') ?></span>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-telephone"></i>
                                <a href="tel:<?= getenv('WEB_TELEPHONE_LINK') ?>"><?= getenv('WEB_TELEPHONE_NUMBER') ?></a>
                            </div>
                            <div class="contact-item">
                                <i class="bi bi-envelope"></i>
                                <a href="<?= getenv('WEB_EMAIL_ADDRESS') ?>"><?= getenv('WEB_EMAIL_ADDRESS') ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="footer-nav-wrapper">
                        <div class="row">
                            <div class="col-6 pt-lg-5">
                                <div class="nav-column">
                                    <h6><?= lang('Theme.website-name') ?></h6>
                                    <nav class="footer-nav">
                                        <?php foreach ($nav as $item) : ?>
                                            <?php if ('locales' == $item[0]) { continue;} ?>
                                            <a href="<?= $item[1] ?>"><?= $item[2] ?></a>
                                        <?php endforeach; ?>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-6 pt-lg-5">
                                <div class="nav-column">
                                    <h6><?= lang('Theme.locales.label') ?></h6>
                                    <nav class="footer-nav">
                                        <?php foreach ($locales as $i => $item) : ?>
                                            <a href="<?= base_url($item . '/' . $lang_uri) ?>"><i class="fi fi-<?= $flag[$i] ?>"></i>&nbsp;<?= lang('Theme.locales.' . $item) ?></a>
                                        <?php endforeach; ?>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="bottom-content" data-aos="fade-up" data-aos-delay="300">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="copyright">
                            <p>&copy; <?= date('Y') ?> <span class="sitename"><?= lang('Theme.company-name') ?></span>. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="legal-links">
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms of Service</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<script>let this_page_slug = '<?= $slug ?>'; </script>
<!-- Vendor JS Files -->
<script src="<?= base_url('/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('/vendor/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('/vendor/aos/aos.js') ?>"></script>
<script src="<?= base_url('/vendor/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('/vendor/glightbox/js/glightbox.min.js') ?>"></script>
<script src="<?= base_url('/vendor/imagesloaded/imagesloaded.pkgd.min.js') ?>"></script>
<script src="<?= base_url('/vendor/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('/vendor/purecounter/purecounter_vanilla.js') ?>"></script>
<?php if ('home' == $slug) : ?>
    <script src="<?= base_url('/vendor/luxon/luxon.min.js') ?>"></script>
    <script src="<?= base_url('/assets/js/homepage.js') ?>"></script>
<?php endif; ?>
<!-- Main JS File -->
<script src="<?= base_url('/assets/js/main.js') ?>"></script>
<script>
    function fixWpClasses() {
        const rows = document.querySelectorAll('.wp-block-columns'); rows.forEach(el => el.classList.add('row'));
        const columns = document.querySelectorAll('.wp-block-column'); columns.forEach(el => el.classList.add('col'));
        const center = document.querySelectorAll('.has-text-align-center'); center.forEach(el => el.classList.add('text-center'));
        const end = document.querySelectorAll('.has-text-align-right'); end.forEach(el => el.classList.add('text-end'));
        const wp_images = document.querySelectorAll('.wp-block-image img'); wp_images.forEach(img => { img.removeAttribute('height'); img.removeAttribute('width'); img.removeAttribute('sizes'); img.classList.add('w-100'); });
    }
    fixWpClasses();
</script>
</body>
</html>