<!DOCTYPE html>
<html lang="<?= $locale ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title><?= lang('Theme.pages.' . $slug) ?> | <?= lang('Theme.website-name') ?></title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:type" content="website"/>
    <!-- Favicons -->
    <link href="#" rel="icon">
    <link href="#" rel="apple-touch-icon">
    <!-- Main CSS File -->
    <link href="" rel="stylesheet">
    <!-- Link Languages -->
    <link rel="alternate" hreflang="en" href="<?= base_url('en/' . $uri) ?>">
    <link rel="alternate" hreflang="th" href="<?= base_url('th/' . $uri) ?>">
    <link rel="alternate" hreflang="zh" href="<?= base_url('zh/' . $uri) ?>">
    <link rel="alternate" hreflang="es" href="<?= base_url('es/' . $uri) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= base_url($uri) ?>">
    <link rel="canonical" href="<?= current_url() ?>">
    <!-- Google tag (gtag.js) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=#######"></script>-->
    <script>
        // window.dataLayer = window.dataLayer || [];
        // function gtag() {dataLayer.push(arguments);}
        // gtag('js', new Date());
        // gtag('config', '#######');
        // gtag('config', '#######');
    </script>
</head>
<body class="index-page">
    Language: <?= $locale ?><br>
    URL: <?= current_url() ?><br>
    Menu:<br>
    <ul>
        <li><a href="<?= base_url($locale) ?>"><?= lang('Theme.pages.home') ?></a></li>
        <li><a href="<?= base_url($locale . '/about-us') ?>"><?= lang('Theme.pages.about-us') ?></a></li>
        <li><a href="<?= base_url($locale . '/contact-us') ?>"><?= lang('Theme.pages.contact-us') ?></a></li>
        <li><a href="<?= base_url($locale . '/blog') ?>"><?= lang('Theme.pages.blog') ?></a></li>
    </ul>
    Languages:<br>
    <ul>
        <li><a href="<?= base_url('en/' . $uri) ?>">English</a></li>
        <li><a href="<?= base_url('th/' . $uri) ?>">ภาษาไทย</a></li>
        <li><a href="<?= base_url('zh/' . $uri) ?>">中文</a></li>
        <li><a href="<?= base_url('es/' . $uri) ?>">español</a></li>
    </ul>
    <?= $this->renderSection('content') ?>
</body>
</html>