<?php foreach ($services['posts'] as $service) : ?>
    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
            <?php if (isset($services['media'][$service['featured_image']])) : ?>
            <div class="specialty-visual">
                <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>"><img src="<?= $services['media'][$service['featured_image']] ?>" alt="<?= $service['title'] ?>" class="img-fluid"></a>
            </div>
            <?php endif; ?>
            <div class="specialty-content">
                <h3 class="mb-1"><a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>"><?= $service['title'] ?></a></h3>
                <p class="mb-1">
                    <?= $service['excerpt'] ?>
                    <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>" class="specialty-link"><?= lang('Home.services.read-more') ?> <i class="bi bi-arrow-right"></i></a>
                </p>
            </div>
        </div>
    </div>
<?php endforeach; ?>