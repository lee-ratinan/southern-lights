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
<?php if (!empty($tag_slug)) : ?>
    <div class="container section-title aos-init aos-animate" data-aos="fade-up">
        <h2><?= lang('Theme.massage_types.' . $tag_slug) ?></h2>
        <p><?= lang('Theme.massage_tag_msg.' . $tag_slug) ?></p>
    </div>
<?php endif; ?>
    <section id="featured-departments" class="featured-departments section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row justify-content-center g-5">
                <?php include "_services-list.php"; ?>
            </div>
            <?php if (!empty($tag_slug)) : ?>
                <p class="text-center mt-5"><a class="btn btn-outline-primary px-5 rounded-pill" href="<?= base_url($locale . '/services') ?>"><?= lang('Theme.show-all') ?></a></p>
            <?php endif; ?>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>