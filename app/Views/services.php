<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title"><?= lang('Theme.pages.services') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="featured-departments" class="featured-departments section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center g-5">
                <?php foreach ($services['posts'] as $service) : ?>
                    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                        <div class="specialty-card">
                            <div class="specialty-content">
                                <div class="specialty-meta">
                                    <span class="specialty-label">Our Service</span>
                                </div>
                                <h3><?= $service['title'] ?></h3>
                                <p><?= $service['excerpt'] ?></p>
                                <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>" class="specialty-link">
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
<?php
include "_contact-us-form.php";
$this->endSection();
?>