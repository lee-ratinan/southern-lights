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
                    <form action="<?= base_url('contact-us') ?>" method="post" class="php-email-form aos-init aos-animate" data-aos="fade-up" data-aos-delay="1000">
                        <div class="row gy-4">
                            <div class="col-12"><h2><i class="fa-regular fa-envelope"></i> <?= lang('Contact.form.title') ?></h2></div>
                            <div class="col-md-12">
                                <label for="name" class="w-100"><span class="d-none"><?= lang('Contact.form.name') ?></span>
                                    <input type="text" id="name" class="form-control" name="name" placeholder="<?= lang('Contact.form.name') ?>" required="">
                                </label>
                            </div>
                            <div class="col-md-6 ">
                                <label for="email" class="w-100"><span class="d-none"><?= lang('Contact.form.email') ?></span>
                                    <input type="email" id="email" class="form-control" name="email" placeholder="<?= lang('Contact.form.email') ?>" required="">
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label for="phone" class="w-100"><span class="d-none"><?= lang('Contact.form.phone') ?></span>
                                    <input type="text" id="phone" class="form-control" name="phone" placeholder="<?= lang('Contact.form.phone') ?>" required="">
                                </label>
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="w-100"><span class="d-none"><?= lang('Contact.form.message') ?></span>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="<?= lang('Contact.form.message') ?>" required=""></textarea>
                                </label>
                            </div>
                            <div class="col-md-12 text-end">
                                <div class="loading"></div>
                                <div class="error-message"><?= lang('Contact.form.responses.error') ?></div>
                                <div class="sent-message"><?= lang('Contact.form.responses.success') ?></div>
                                <button class="btn btn-success" type="submit"><?= lang('Contact.form.send') ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>