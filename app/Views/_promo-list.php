<?php foreach ($promotions['posts'] as $service) : ?>
    <div class="col-lg-4 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="100">
        <div class="specialty-card">
            <?php if (isset($promotions['media'][$service['featured_image']])) : ?>
                <div class="specialty-visual">
                    <a href="<?= base_url($locale . '/promotions/view?q=' . $service['slug']) ?>"><img src="<?= $promotions['media'][$service['featured_image']] ?>" alt="<?= $service['title'] ?>" class="img-fluid"></a>
                </div>
            <?php endif; ?>
            <div class="specialty-content bg-white">
                <h3 class="mb-1"><a href="<?= base_url($locale . '/promotions/view?q=' . $service['slug']) ?>"><?= $service['title'] ?></a></h3>
                <p class="mb-1"><?= $service['excerpt'] ?></p>
                <?php if (!empty($service['tag_ids'])) : ?>
                    <?php $prices = []; ?>
                    <?php foreach ($service['tag_ids'] as $tag_id) : ?>
                        <?php if (isset($promotions['tags'][$tag_id])) : ?>
                            <?php $the_tag = $promotions['tags'][$tag_id]; ?>
                            <?php if (preg_match("/\d{1,3}-\d{1,3}-\d{1,3}/", $the_tag)) : ?>
                                <?php
                                $split      = explode('-', $the_tag);
                                $minutes    = intval($split[0]);
                                $price      = '$' . number_format($split[1]);
                                $full_price = '';
                                $per        = '';
                                if (isset($split[2])) {
                                    $full_price = '<s>$' . number_format($split[2]) . '</s>';
                                }
                                if (isset($split[3])) {
                                    $per = 'per ' . $split[3];
                                }
                                $prices[$minutes . $per] = [
                                    'price'      => $price,
                                    'full_price' => $full_price,
                                    'per'        => $per,
                                ];
                                ?>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php ksort($prices); ?>
                    <table class="table table-sm table-borderless pricing">
                        <?php foreach ($prices as $minutes => $price) : ?>
                            <tr>
                                <td><?= intval($minutes) ?> min</td>
                                <td><b class="text-danger"><?= $price['price'] ?></b></td>
                                <td><?= $price['full_price'] ?></td>
                                <td><?= $price['per'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
                <a href="<?= base_url($locale . '/promotions/view?q=' . $service['slug']) ?>" class="specialty-link"><?= lang('Home.services.read-more') ?> <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
<?php endforeach; ?>