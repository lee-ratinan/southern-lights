<?php
$this->extend('_layout.php');
$this->section('content');
$format_locales = [
    'en' => 'en-NZ',
    'es' => 'es-ES',
    'ja' => 'ja-JP',
    'zh' => 'zh-CN',
];
$js_locale = $format_locales[$locale] ?? 'en-NZ';
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
    <section id="contact" class="contact section featured-departments">
        <div class="container-fluid map-container aos-init aos-animate mt-0 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="map-overlay"></div>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3191.784394044653!2d174.77683041426!3d-36.87157928067011!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6d0d4870a4257851%3A0xe5203502c6391997!2s51%20Remuera%20Road%2C%20Newmarket%2C%20Auckland%201050%2C%20New%20Zealand!5e0!3m2!1sen!2ssg!4v1757821786539!5m2!1sen!2ssg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col">
                    <div class="contact-info-wrapper">
                        <h2><?= lang('Theme.website-name') ?></h2>
                        <div class="row g-3">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="specialty-card w-100">
                                    <div class="specialty-content">
                                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                                            <div class="info-icon">
                                                <i class="bi bi-geo-alt"></i>
                                            </div>
                                            <div class="info-content">
                                                <h3><?= lang('Contact.info.address') ?></h3>
                                                <p><a href="<?= getenv('GOOGLE_MAP') ?>" target="_blank"><?= getenv('WEB_STORE_ADDRESS') ?></a></p>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
                                            <div class="info-icon">
                                                <i class="bi bi-envelope"></i>
                                            </div>
                                            <div class="info-content">
                                                <h3><?= lang('Contact.info.email') ?></h3>
                                                <p>
                                                    <?php
                                                    $emails     = getenv('WEB_EMAIL_ADDRESS');
                                                    $emails     = explode(',', $emails);
                                                    $email_list = [];
                                                    foreach ($emails as $email) {
                                                        $email_list[] = '<a href="mailto:' . $email . '">' . $email . '</a>';
                                                    }
                                                    echo implode('<br>', $email_list);
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                        <hr />
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
                                </div>
                            </div>
                            <div class="col-12 col-md-6 d-flex">
                                <div class="specialty-card w-100">
                                    <div class="specialty-content">
                                        <div class="contact-info-item aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
                                            <div class="info-icon">
                                                <i class="bi bi-clock"></i>
                                            </div>
                                            <div class="info-content">
                                                <h3><?= lang('Contact.info.hours') ?></h3>
                                                <div id="opening-hours"></div>
                                                <p class="small text-secondary"><?= lang('Contact.info.differ-on-ph') ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function formatTime(timeStr, locale) {
                const [hour, minute] = timeStr.split(":").map(Number);
                const date = new Date();
                date.setHours(hour, minute);
                return new Intl.DateTimeFormat(locale, {hour: "numeric", minute: "numeric"}).format(date);
            }
            const opening_hours = <?= json_encode($opening_hours) ?>;
            const dayMap = ["SUN", "MON", "TUE", "WED", "THU", "FRI", "SAT"];
            const todayIndex = new Date().getDay();
            const orderedDays = [...dayMap.slice(todayIndex), ...dayMap.slice(0, todayIndex)];
            const container = document.getElementById("opening-hours");
            let isFirstDay = true;
            orderedDays.forEach(day => {
                const hours = opening_hours[day];
                const line = document.createElement("div");
                const userLocale = '<?= $js_locale ?>';
                let lineText = '';
                if (hours) {
                    const open = formatTime(hours[0], userLocale);
                    const close = formatTime(hours[1], userLocale);
                    lineText = `${day}: ${open} - ${close}`;
                } else {
                    lineText = `${day}: <?= lang('Contact.info.closed') ?>`;
                }
                if (isFirstDay) {
                    lineText = '<b>' + lineText + '</b>';
                    isFirstDay = false;
                }
                line.innerHTML = lineText;
                container.appendChild(line);
            });
        });
    </script>
<?php
include "_contact-us-form.php";
$this->endSection();
?>