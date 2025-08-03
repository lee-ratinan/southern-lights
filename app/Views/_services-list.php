<?php foreach ($services['posts'] as $service) : ?>
    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
            <div class="specialty-content">
                <div class="specialty-meta">
                    <span class="specialty-label"><?= lang('Home.services.our-service') ?></span>
                </div>
                <h3><?= $service['title'] ?></h3>
                <p><?= $service['excerpt'] ?></p>
                <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>" class="specialty-link">
                    <?= lang('Home.services.read-more') ?> <i class="bi bi-arrow-right"></i>
                </a>
            </div>
            <div class="specialty-visual">
                <img src="<?= $services['media'][$service['featured_image']] ?>" alt="Cardiovascular Medicine" class="img-fluid">
            </div>
        </div>
    </div>
<?php endforeach; ?>