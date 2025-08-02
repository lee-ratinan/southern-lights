<section id="contact" class="contact section">
    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
            <div class="col">
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