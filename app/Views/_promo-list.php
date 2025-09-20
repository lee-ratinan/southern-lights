<?php foreach ($promotions['posts'] as $promotion) : ?>
    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
            <?php if (isset($promotions['media'][$promotion['featured_image']])) : ?>
                <div class="specialty-visual">
                    <a href="<?= base_url($locale . '/promotions/view?q=' . $promotion['slug']) ?>"><img src="<?= $promotions['media'][$promotion['featured_image']] ?>" alt="<?= $promotion['title'] ?>" class="img-fluid"></a>
                </div>
            <?php endif; ?>
            <div class="specialty-content bg-white">
                <h3 class="mb-1"><a href="<?= base_url($locale . '/promotions/view?q=' . $promotion['slug']) ?>"><?= $promotion['title'] ?></a></h3>
                <p class="mb-1"><?= crop_excerpt($promotion['excerpt']) ?></p>
                <?php if (!empty($promotion['tag_ids'])) : ?>
                    <?php
                    $all_tags = [];
                    foreach ($promotion['tag_ids'] as $tag_id) {
                        $all_tags[$tag_id] = $promotions['tags'][$tag_id];
                    }
                    process_price_tags_cheapest($all_tags, $locale, 'promotions');
                    ?>
                <?php endif; ?>
                <a href="<?= base_url($locale . '/promotions/view?q=' . $promotion['slug']) ?>" class="specialty-link"><?= lang('Home.services.read-more') ?> <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>