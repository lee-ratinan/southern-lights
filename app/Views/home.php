<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <!-- Hero Section -->
    <section id="hero" class="hero section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="hero-content">
                        <div class="trust-badges mb-4" data-aos="fade-right" data-aos-delay="200">
                            <div class="badge-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Authentic Thai</span>
                            </div>
                            <div class="badge-item">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <span>Excellence Service</span>
                            </div>
                        </div>
                        <h1 data-aos="fade-right" data-aos-delay="300">
                            Excellence in <span class="highlight">Hospitality</span> With Compassionate Care
                        </h1>
                        <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                            Experience authentic Thai healing in the heart of Auckland—where every touch soothes, and every visit restores balance.
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
                                <i class="bi bi-telephone"></i> &nbsp;
                                Book Now
                            </a>
                            <a href="<?= getenv('GIFT_VOUCHER_LINK') ?>" class="btn btn-outline">
                                <i class="bi bi-arrow-right"></i> &nbsp;
                                Buy Gift Voucher
                            </a>
                        </div>
                    </div>
                </div>
                <!-- IMG SECTION -->
                <div class="col-lg-6">
                    <div class="hero-visual" data-aos="fade-left" data-aos-delay="400">
                        <div class="main-image">
                            <img src="<?= base_url('assets/img/home/hero-img.webp') ?>" alt="Modern Healthcare Facility" class="img-fluid">
                            <div class="floating-card appointment-card">
                                <div class="card-icon">
                                    <i class="bi bi-calendar-check"></i>
                                </div>
                                <div class="card-content" id="home-page-opening-hours-opened" style="display: none;">
                                    <h6>We are open now.</h6>
                                    <small>Book your session now!</small>
                                </div>
                                <div class="card-content" id="home-page-opening-hours-closed" style="display: none;">
                                    <h6>Currently closed.</h6>
                                    <small id="home-page-opening-hours-next-label">Next opening: <span id="home-page-opening-hours-next"></span></small>
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
    </section><!-- /Hero Section -->
    <!-- Featured Program -->
    <section id="featured-departments" class="featured-departments section">
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h2>Featured Services</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <?php foreach ($services['posts'] as $service) : ?>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="specialty-card">
                            <div class="specialty-content">
                                <div class="specialty-meta">
                                    <span class="specialty-label">Our Service</span>
                                </div>
                                <h3><?= $service['title'] ?></h3>
                                <p><?= $service['excerpt'] ?></p>
                                <a href="<?= base_url($locale . '/services/' . $service['slug']) ?>" class="specialty-link">
                                    Read more <i class="bi bi-arrow-right"></i>
                                </a>
                            </div>
                            <div class="specialty-visual">
                                <img src="<?= $services['media'][$service['featured_image']] ?>" alt="Cardiovascular Medicine" class="img-fluid">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php if ($promotion && !empty($promotion)) : ?>
    <div class="modal fade" id="promoModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content text-center">
                <div class="modal-body p-0">
                    <a href="<?= base_url($locale . '/promotions') ?>">
                        <img src="<?= $promotion['featured_image'] ?>" alt="Promotion" class="img-fluid w-100" />
                    </a>
                    <button id="dontShowBtn" class="btn btn-sm btn-outline-secondary my-2 me-2 float-end">Don't show again</button>
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