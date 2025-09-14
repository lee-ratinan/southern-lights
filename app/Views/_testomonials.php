<section id="featured-testimonials" class="featured-testimonials section">
    <div class="container aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonials-14 swiper init-swiper swiper-initialized swiper-horizontal swiper-backface-hidden">
            <script type="application/json" class="swiper-config">{"loop":true,"speed":600,"autoplay":{"delay":5000},"slidesPerView":3,"spaceBetween":24,"pagination":{"el":".swiper-pagination","type":"bullets","clickable":true},"breakpoints":{"320":{"slidesPerView":1,"spaceBetween":16},"768":{"slidesPerView":2,"spaceBetween":24},"1200":{"slidesPerView":3,"spaceBetween":24}}}</script>
            <div class="swiper-wrapper" id="swiper-wrapper-17032b5968d10acd3" aria-live="off" style="transition-duration: 0ms; transform: translate3d(-1320px, 0px, 0px); transition-delay: 0ms;">
                <?php $count = 5; ?>
                <?php for ($i = 0; $i < $count; $i++) : ?>
                    <?php $j = $i + 1; ?>
                    <div class="swiper-slide" role="group" aria-label="<?= $j ?> / <?= $count ?>" data-swiper-slide-index="2" style="width: 416px; margin-right: 24px;">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                            <p><?= lang('Testimony.' . $j . '.message') ?></p>
                            <div class="profile">
                                <img src="<?= base_url('assets/img/testimony-' . $j . '.png') ?>" class="testimonial-img" alt="" loading="lazy">
                                <div class="info">
                                    <h4><?= lang('Testimony.' . $j . '.name') ?> <i class="bi bi-patch-check-fill"></i></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <div class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
                <?php for ($i = 1; $i <= $count; $i++) : ?>
                    <span class="swiper-pagination-bullet" tabindex="0" role="button" aria-label="Go to slide <?= $i ?>"></span>
                <?php endfor; ?>
            </div>
            <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
        </div>
    </div>
</section>