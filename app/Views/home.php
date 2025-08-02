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
                            <a href="#" class="btn btn-primary">
                                <i class="bi bi-telephone"></i> &nbsp;
                                Book Now
                            </a>
                            <a href="#" class="btn btn-outline">
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
            <h2>Featured Departments</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                    <div class="specialty-card">
                        <div class="specialty-content">
                            <div class="specialty-meta">
                                <span class="specialty-label">Specialized Care</span>
                            </div>
                            <h3>Cardiovascular Medicine</h3>
                            <p>Advanced diagnostic imaging and interventional procedures for comprehensive heart health management with personalized treatment protocols.</p>
                            <div class="specialty-features">
                                <span><i class="bi bi-check-circle-fill"></i>24/7 Emergency Cardiac Care</span>
                                <span><i class="bi bi-check-circle-fill"></i>Minimally Invasive Procedures</span>
                            </div>
                            <a href="department-details.html" class="specialty-link">
                                Explore Cardiology <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <div class="specialty-visual">
                            <img src="#" alt="Cardiovascular Medicine" class="img-fluid">
                            <div class="visual-overlay">
                                <i class="bi bi-heart-pulse"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- End Specialty Card -->
                <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                    <div class="specialty-card">
                        <div class="specialty-content">
                            <div class="specialty-meta">
                                <span class="specialty-label">Expert Care</span>
                            </div>
                            <h3>Neurological Sciences</h3>
                            <p>Cutting-edge neuroimaging and neurosurgical expertise for complex brain and spinal cord conditions with innovative treatment approaches.</p>
                            <div class="specialty-features">
                                <span><i class="bi bi-check-circle-fill"></i>Advanced Brain Imaging</span>
                                <span><i class="bi bi-check-circle-fill"></i>Robotic Surgery</span>
                            </div>
                            <a href="department-details.html" class="specialty-link">
                                Explore Neurology <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <div class="specialty-visual">
                            <img src="#" alt="Neurological Sciences" class="img-fluid">
                            <div class="visual-overlay">
                                <i class="bi bi-cpu"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- End Specialty Card -->
                <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                    <div class="specialty-card">
                        <div class="specialty-content">
                            <div class="specialty-meta">
                                <span class="specialty-label">Expert Care</span>
                            </div>
                            <h3>Neurological Sciences</h3>
                            <p>Cutting-edge neuroimaging and neurosurgical expertise for complex brain and spinal cord conditions with innovative treatment approaches.</p>
                            <div class="specialty-features">
                                <span><i class="bi bi-check-circle-fill"></i>Advanced Brain Imaging</span>
                                <span><i class="bi bi-check-circle-fill"></i>Robotic Surgery</span>
                            </div>
                            <a href="department-details.html" class="specialty-link">
                                Explore Neurology <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                        <div class="specialty-visual">
                            <img src="#" alt="Neurological Sciences" class="img-fluid">
                            <div class="visual-overlay">
                                <i class="bi bi-cpu"></i>
                            </div>
                        </div>
                    </div>
                </div><!-- End Specialty Card -->
            </div>
            <div class="emergency-banner aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="emergency-content">
                            <h3>Emergency Services Available 24/7</h3>
                            <p>Our emergency department is equipped with state-of-the-art technology and staffed by board-certified emergency physicians ready to provide immediate care.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a href="tel:+15551234567" class="emergency-btn">
                            <i class="bi bi-telephone-fill"></i>
                            Call Emergency: (555) 123-4567
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>