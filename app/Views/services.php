<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <section id="about" class="about section" style="margin-top:100px !important;">
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h1><?= lang('Theme.website-name') ?></h1>
            <h2><?= lang('Theme.pages.' . $slug) ?></h2>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row">
                <div class="col">
                    <p><?= lang('Blog.updated', [format_post_date($content['updated'], $locale)]) ?></p>
                    <article>
                        <?= $content['content'] ?>
                    </article>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>