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
                        <div class="hero-stats mb-4 d-none" data-aos="fade-right" data-aos-delay="500">
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Years Experience</p>
                            </div>
                            <div class="stat-item">
                                <h3><span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="2" class="purecounter"></span>+</h3>
                                <p>Patients Treated</p>
                            </div>
                        </div>
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
                            (this img > seasonal promo if any, use default when no promo)
                            <img src="<?= base_url('assets/img/home/hero-img.webp') ?>" alt="Modern Healthcare Facility" class="img-fluid">
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
            <p><?= lang('Home.services.para') ?></p>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <?php include "_services-list.php"; ?>
                <div class="col-12 text-center">
                    <a class="btn btn-bg btn-outline-primary rounded-pill px-5" href="<?= base_url($locale . '/services/') ?>">+ <?= lang('Home.services.more-services') ?> +</a>
                    <div class="pt-3">
                        <?php include "_book_and_buy.php"; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    (permanent promo - couple / early-bird)<br>
    (new staff - capturing horny customers)<br>
    (shower and parking space)<br>
    (background: white, maybe bright sky)<br>
    <?php if ($promotion && !empty($promotion)) : ?>
    <div class="modal fade" id="promoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-center">
                <div class="modal-body p-0">
                    <a href="<?= base_url($locale . '/promotions') ?>">
                        <img src="<?= $promotion['featured_image'] ?>" alt="Promotion" class="img-fluid w-100" />
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