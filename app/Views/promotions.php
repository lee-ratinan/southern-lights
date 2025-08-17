<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title"><?= lang('Theme.pages.promotions') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="blog" class="blog featured-departments section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <?php if (empty($promotions['posts'])) : ?>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="alert alert-warning" role="alert"><?= lang('Blog.others.no-promo') ?></div>
                    </div>
                <?php else : ?>
                    <?php foreach ($promotions['posts'] as $post) : ?>
                        <div class="col-md-6 col-xxl-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
                            <div class="specialty-card">
                                <?php if (!empty($promotions['media'][$post['featured_image']])) : ?>
                                    <div class="specialty-visual">
                                        <img src="<?= $promotions['media'][$post['featured_image']] ?>" alt="<?= $post['title'] ?>" class="img-fluid">
                                    </div>
                                <?php endif; ?>
                                <div class="specialty-content">
                                    <div class="specialty-meta">
                                        <span class="specialty-label"><?= lang('Theme.pages.promotions') ?></span>
                                    </div>
                                    <h3><?= $post['title'] ?></h3>
                                    <p><?= $post['excerpt'] ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>