<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <section id="hero" class="hero section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6 mt-5">
                    <div class="hero-content">
                        <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="badge-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span><?= lang('Home.hero.badge.badge1') ?></span>
                            </div>
                            <div class="badge-item">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <span><?= lang('Home.hero.badge.badge2') ?></span>
                            </div>
                        </div>
                        <h1 data-aos="fade-right" data-aos-delay="300">
                            <?= lang('Home.hero.badge.message1') ?>
                        </h1>
                        <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                            <?= lang('Home.hero.badge.message2') ?>
                        </p>
                        <div class="hero-actions" data-aos="fade-right" data-aos-delay="600">
                            <a href="<?= getenv('BOOK_NOW_LINK') ?>" class="btn btn-primary">
                                <i class="bi bi-bookmark-check-fill"></i> &nbsp;
                                <?= lang('Theme.cta.book-now') ?>
                            </a>
                            <a href="<?= getenv('GIFT_VOUCHER_LINK') ?>" class="btn btn-outline">
                                <i class="bi bi-arrow-right"></i> &nbsp;
                                <?= lang('Theme.cta.buy-voucher') ?>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- IMG SECTION -->
                <div class="col-lg-6 mt-5">
                    <div class="hero-visual mt-5" data-aos="fade-left" data-aos-delay="400">
                        <div class="main-image">
                            <?php if (!empty($promotion_hero['featured_media_files']['full'])) : ?>
                                <img src="<?= $promotion_hero['featured_media_files']['full'] ?>" alt="Modern Healthcare Facility" class="img-fluid">
                            <?php else: ?>
                                <img src="<?= base_url('assets/img/home/hero-img.webp') ?>" alt="Modern Healthcare Facility" class="img-fluid">
                            <?php endif; ?>
                            <div class="floating-card appointment-card">
                                <div class="card-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div class="card-content" id="home-page-opening-hours-opened" style="display: none;">
                                    <h6><?= lang('Home.opening-hours-app.open-now') ?></h6>
                                    <small><?= lang('Home.opening-hours-app.open-msg') ?></small>
                                </div>
                                <div class="card-content" id="home-page-opening-hours-closed" style="display: none;">
                                    <h6><?= lang('Home.opening-hours-app.close-now') ?></h6>
                                    <small id="home-page-opening-hours-next-label"><?= lang('Home.opening-hours-app.close-msg') ?> <span id="home-page-opening-hours-next"></span></small>
                                </div>
                            </div>
                            <div class="floating-card rating-card d-none">
                                <div class="card-content">
                                    <div class="rating-stars">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <h6>4.9/5</h6>
                                    <small>1,234 Reviews</small>
                                </div>
                            </div>
                        </div>
                        <div class="background-elements">
                            <div class="element element-1"></div>
                            <div class="element element-2"></div>
                            <div class="element element-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="featured-departments" class="featured-departments section">
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2><?= lang('Home.services.heading') ?></h2>
            <p class="mb-3"><?= lang('Home.services.para') ?></p>
            <a class="btn btn-bg btn-outline-primary rounded-pill px-5" href="<?= base_url($locale . '/services/') ?>">+ <?= lang('Home.services.more-services') ?> +</a>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <?php include "_services-list.php"; ?>
                <div class="col-12 text-center">
                    <div class="pt-3">
                        <?php include "_book_and_buy.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PERMANENT PROMO -->
    <section id="featured-departments" class="featured-departments section">
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2><?= lang('Home.permanent-promo.heading') ?></h2>
        </div><!-- End Section Title -->
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-4">
                <?php foreach (lang('Home.permanent-promo.promos') as $key => $details) : ?>
                    <div class="col-lg-6 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="specialty-card">
                            <div class="specialty-content p-4">
                                <h3><?= $details['title'] ?></h3>
                                <p><?= $details['detail'] ?></p>
                            </div>
                            <div class="specialty-visual">
                                <img src="assets/img/health/<?= $key ?>.jpg" alt="<?= $details['title'] ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- STAFF -->
<?php if (!empty($staff['posts'])) : ?>
    <section id="featured-departments" class="featured-departments section">
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2><?= lang('Home.staff.heading') ?></h2>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <?php foreach ($staff['posts'] as $staff_member) : ?>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="specialty-card">
                            <div class="specialty-visual">
                                <img src="<?= $staff_member['media'][$staff_member['featured_image']] ?>"
                                     alt="<?= $staff_member['title'] ?>" class="img-fluid">
                            </div>
                            <div class="specialty-content">
                                <h3 class="mb-1"><?= $staff_member['title'] ?></h3>
                                <p class="mb-1">
                                    <?= $staff_member['excerpt'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
    <!-- SHOWER -->
    <section id="shower" class="home-about section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                    <div class="about-content">
                        <h2 class="section-heading">Come with Our Equipped Shower</h2>
                        <p class="lead-text">Go back to something later? No worry, we have shower facilities ready for you!</p>
                    </div>
                </div>
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
                    <div class="about-visual">
                        <div class="main-image">
                            <img src="assets/img/home/shower.jpg" alt="Modern medical facility" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PARKING -->
    <section id="featured-services" class="featured-services section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0">
                <div class="col-lg-8 aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
                    <div class="featured-service-main">
                        <div class="service-image-wrapper">
                            <img src="assets/img/home/parking.webp" alt="Premier Healthcare Services" class="img-fluid" loading="lazy">
                            <div class="service-overlay">
                                <div class="service-badge">
                                    <i class="bi bi-car-front"></i>
                                    <span>Parking Spaces</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 aos-init aos-animate" data-aos="fade-left" data-aos-delay="300">
                    <div class="services-sidebar">
                        <div class="service-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                            <div class="service-info">
                                <h2 class="section-heading">We Have Our Own Parking Spaces</h2>
                                <p>The location is ...</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIALS -->
<?php include "_testomonials.php"; ?>
    <!-- PROMOTION POPUP! -->
<?php if (!empty($promotion_popup['featured_media_files']['full'])) : ?>
    <div class="modal fade" id="promoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-center">
                <div class="modal-body p-0">
                    <a href="<?= base_url($locale . '/promotions') ?>">
                        <img src="<?= $promotion_popup['featured_media_files']['full'] ?>" alt="Promotion" class="img-fluid w-100" />
                    </a>
                    <button id="dontShowBtn" class="btn btn-sm btn-outline-secondary my-2 me-2 float-end"><?= lang('Home.popup-btn') ?></button>
                </div>
            </div>
        </div>
    </div>
    <script>let has_promotion_popup = true;</script>
<?php else: ?>
    <script>let has_promotion_popup = false;</script>
<?php endif; ?>
<?php
include "_contact-us-form.php";
$this->endSection();
?>