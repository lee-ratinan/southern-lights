<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title"><?= $post['title'] ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="blog" class="blog section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row">
                <div class="col col-md-10 col-lg-8">
                    <p><i class="bi bi-caret-right"></i> <a href="<?= base_url($locale . '/services') ?>"><?= lang('Theme.pages.services') ?></a> <i class="bi bi-caret-right"></i> <?= $post['title'] ?> <i class="bi bi-caret-right"></i></p>
                    <?php if (isset($post['media']['media_details'])) : ?>
                        <img src="<?= $post['media']['media_details']['sizes']['full']['source_url'] ?>" alt="<?= $post['title'] ?>" class="img-fluid mb-5" />
                    <?php endif; ?>
                    <article>
                        <?= $post['post_data']['content']['rendered'] ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>