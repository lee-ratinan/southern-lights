<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title"><?= lang('Theme.pages.about-us') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="about" class="about section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-right" data-aos-delay="100">
                    <div class="about-content">
                        <h2>Compassionate Care for All</h2>
                        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="stats-grid d-none">
                            <div class="stat-item">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="15000" data-purecounter-duration="2">999</span>
                                <span class="stat-label">xxx</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="25" data-purecounter-duration="2">999</span>
                                <span class="stat-label">xxx</span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2">999</span>
                                <span class="stat-label">xxx</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                    <div class="image-wrapper">
                        <img src="<?= base_url('assets/img/about/about.jpg') ?>" class="img-fluid main-image" alt="Healthcare facility">
                        <div class="floating-image aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                            <img src="<?= base_url('assets/img/about/person.webp') ?>" class="img-fluid" alt="Medical team">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>