<?php foreach ($services['posts'] as $service) : ?>
    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
            <?php if (isset($services['media'][$service['featured_image']])) : ?>
            <div class="specialty-visual">
                <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>"><img src="<?= $services['media'][$service['featured_image']] ?>" alt="<?= $service['title'] ?>" class="img-fluid"></a>
            </div>
            <?php endif; ?>
            <div class="specialty-content bg-white">
                <h3 class="mb-1"><a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>"><?= $service['title'] ?></a></h3>
                <p class="mb-1"><?= crop_excerpt($service['excerpt']) ?></p>
                <?php if (!empty($service['tag_ids'])) : ?>
                    <?php
                    $all_tags = [];
                    foreach ($service['tag_ids'] as $tag_id) {
                        $all_tags[] = $services['tags'][$tag_id];
                    }
                    process_price_tags_cheapest($all_tags);
                    ?>
                <?php endif; ?>
                <a href="<?= base_url($locale . '/services/view?q=' . $service['slug']) ?>" class="specialty-link"><?= lang('Home.services.read-more') ?> <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>