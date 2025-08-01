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
                                <i class="bi bi-journal-check"></i>
                                <span>Authentic Thai</span>
                            </div>
                            <div class="badge-item">
                                <i class="bi bi-hand-thumbs-up-fill"></i>
                                <span>Excellence Service</span>
                            </div>
                            <div class="badge-item">
                                <i class="bi bi-star-fill"></i>
                                <span>4.9/5 Rating</span>
                            </div>
                        </div>
                        <h1 data-aos="fade-right" data-aos-delay="300">
                            Excellence in <span class="highlight">Hospitality</span> With Compassionate Care
                        </h1>
                        <p class="hero-description" data-aos="fade-right" data-aos-delay="400">
                            Experience authentic Thai healing in the heart of Auckland—where every touch soothes, and every visit restores balance.
                        </p>
                        <div class="hero-stats mb-4" data-aos="fade-right" data-aos-delay="500">
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
                            <a href="appointment.html" class="btn btn-primary">
                                <i class="bi bi-telephone"></i> &nbsp;
                                Book Now
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
                                <div class="card-content">
                                    <h6>Now Open</h6>
                                    <small>Book your session now!</small>
                                </div>
                            </div>
                            <div class="floating-card rating-card">
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
<?php
$this->endSection();
?>