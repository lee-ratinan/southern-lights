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
            <div class="row justify-content-center g-5">
                <?php include "_services-list.php"; ?>
            </div>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>