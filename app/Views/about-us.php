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
                        <h2><?= lang('About.header') ?></h2>
                        <p class="lead"><?= lang('About.para1') ?></p>
                        <p><?= lang('About.para2') ?></p>
                        <div class="stats-grid">
                            <div class="stat-item">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="2025" data-purecounter-duration="2">2025</span>
                                <span class="stat-label"><?= lang('About.counter1') ?></span>
                            </div>
                            <div class="stat-item">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="2">10</span>
                                <span class="stat-label"><?= lang('About.counter2') ?></span>
                            </div>
                            <div class="stat-item d-none">
                                <span class="stat-number" data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="2">999</span>
                                <span class="stat-label"><?= lang('About.counter3') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                    <div class="image-wrapper">
                        <img src="<?= base_url('assets/img/about/about.jpg') ?>" class="img-fluid main-image" alt="<?= lang('About.alt1') ?>">
                        <div class="floating-image aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                            <img src="<?= base_url('assets/img/about/person.webp') ?>" class="img-fluid" alt="<?= lang('About.alt2') ?>">
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