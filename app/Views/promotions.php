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
    <section id="promotions" class="promotions section">
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col col-md-10 col-lg-8">
                    <article>
                        <?= $content['content'] ?>
                    </article>
                    <hr />
                    <p class="small text-secondary"><?= lang('Blog.updated', [format_post_date($content['updated'], $locale)]) ?></p>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>