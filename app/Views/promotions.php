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
<?php if (!empty($tag_slug)) : ?>
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2><?= lang('Theme.massage_types.' . $tag_slug) ?></h2>
        <p><?= lang('Theme.massage_tag_msg.' . $tag_slug) ?></p>
    </div>
<?php endif; ?>
    <section id="blog" class="blog featured-departments section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center">
                <?php if (empty($promotions['posts'])) : ?>
                    <div class="col-12 col-md-10 col-lg-8">
                        <div class="alert alert-warning" role="alert"><?= lang('Blog.others.no-promo') ?></div>
                    </div>
                <?php else : ?>
                    <?php include '_promo-list.php'; ?>
                <?php endif; ?>
            </div>
            <?php if (!empty($tag_slug)) : ?>
                <p class="text-center mt-5"><a class="btn btn-outline-primary px-5 rounded-pill" href="<?= base_url($locale . '/services') ?>"><?= lang('Theme.show-all') ?></a></p>
            <?php endif; ?>
        </div>
    </section>
<?php
$this->endSection();
?>