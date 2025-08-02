<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <div class="page-title">
        <div class="heading">
            <div class="container">
                <div class="row d-flex justify-content-center text-center">
                    <div class="col-lg-8">
                        <h1 class="heading-title"><?= lang('Theme.pages.contact-us') ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="contact" class="contact section">
        <div class="container-fluid map-container aos-init aos-animate mt-0 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="map-overlay"></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-5">
                    <div class="contact-info-wrapper">
                        <h2><?= lang('Theme.website-name') ?></h2>
                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                            <div class="info-icon">
                                <i class="bi bi-geo-alt"></i>
                            </div>
                            <div class="info-content">
                                <h3><?= lang('Contact.info.address') ?></h3>
                                <p><?= getenv('WEB_STORE_ADDRESS') ?></p>
                            </div>
                        </div>
                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                            <div class="info-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            <div class="info-content">
                                <h3><?= lang('Contact.info.email') ?></h3>
                                <p><a href="mailto:<?= getenv('WEB_EMAIL_ADDRESS') ?>"><?= getenv('WEB_EMAIL_ADDRESS') ?></a></p>
                            </div>
                        </div>
                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                            <div class="info-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                            <div class="info-content">
                                <h3><?= lang('Contact.info.phone') ?></h3>
                                <p><a href="tel:<?= getenv('WEB_TELEPHONE_LINK') ?>"><?= getenv('WEB_TELEPHONE_NUMBER') ?></a></p>
                            </div>
                        </div>
                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                            <div class="info-icon">
                                <i class="bi bi-headset"></i>
                            </div>
                            <div class="info-content">
                                <h3><?= lang('Contact.info.hours') ?></h3>
                                <?php foreach (lang('Contact.info.hours_detail') as $line) : ?>
                                    <p><?= $line ?></p>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="contact-form-card aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                        <h2><?= lang('Contact.form.title') ?></h2>
                        <p class="mb-4"><?= lang('Contact.form.subtitle') ?></p>
                        <form action="<?= base_url('contact-us') ?>" method="post" class="php-email-form">
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="w-100" for="name">
                                        <span class="d-none"><?= lang('Contact.form.name') ?></span>
                                        <input type="text" class="form-control w-100" name="name" id="name" placeholder="<?= lang('Contact.form.name') ?>" required="required" autocomplete="true">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="w-100" for="email">
                                        <span class="d-none"><?= lang('Contact.form.email') ?></span>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="<?= lang('Contact.form.email') ?>" autocomplete="true">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="w-100" for="phone">
                                        <span class="d-none"><?= lang('Contact.form.phone') ?></span>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="<?= lang('Contact.form.phone') ?>" required="required" autocomplete="true">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="w-100" for="subject">
                                        <span class="d-none"><?= lang('Contact.form.subject') ?></span>
                                        <input type="text" class="form-control" name="subject" id="subject" placeholder="<?= lang('Contact.form.subject') ?>" autocomplete="false">
                                    </label>
                                </div>

                                <div class="col-12">
                                    <label class="w-100" for="message">
                                        <span class="d-none"><?= lang('Contact.form.message') ?></span>
                                        <textarea class="form-control" name="message" id="message" placeholder="<?= lang('Contact.form.message') ?>" rows="6" required="required"></textarea>
                                    </label>
                                </div>
                                <div class="col-12">
                                    <div class="loading"></div>
                                    <div class="error-message"><?= lang('Contact.form.responses.error') ?></div>
                                    <div class="sent-message"><?= lang('Contact.form.responses.success') ?></div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-submit"><?= lang('Contact.form.send') ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>