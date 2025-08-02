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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d73245.21957032372!2d174.65942832813198!3d-36.855731272278206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d471233b27243%3A0x56925ebc833ee8ee!2sAuckland%20Zoo!5e0!3m2!1sen!2ssg!4v1754141828168!5m2!1sen!2ssg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col">
                    <div class="contact-info-wrapper">
                        <h2><?= lang('Theme.website-name') ?></h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                    <div class="info-icon">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3><?= lang('Contact.info.address') ?></h3>
                                        <p><?= getenv('WEB_STORE_ADDRESS') ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                    <div class="info-icon">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3><?= lang('Contact.info.email') ?></h3>
                                        <p><a href="mailto:<?= getenv('WEB_EMAIL_ADDRESS') ?>"><?= getenv('WEB_EMAIL_ADDRESS') ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
                                    <div class="info-icon">
                                        <i class="bi bi-phone"></i>
                                    </div>
                                    <div class="info-content">
                                        <h3><?= lang('Contact.info.phone') ?></h3>
                                        <p><a href="tel:<?= getenv('WEB_TELEPHONE_LINK') ?>"><?= getenv('WEB_TELEPHONE_NUMBER') ?></a></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4 col-xl-3">
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
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "_contact-us-form.php";
$this->endSection();
?>