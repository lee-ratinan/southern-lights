<?php
$this->extend('_layout.php');
$this->section('content');
?>
    <section id="about" class="about section" style="margin-top:100px !important;">
        <!-- Section Title -->
        <div class="container section-title aos-init aos-animate" data-aos="fade-up">
            <h1><?= lang('Theme.website-name') ?></h1>
            <h2><?= lang('Theme.pages.' . $slug) ?></h2>
        </div><!-- End Section Title -->
        <div class="container">
            <div class="row mb-3">
                <div class="d-none d-md-block col-md-6 col-lg-8">&nbsp;</div>
                <div class="col-md-6 col-lg-4">
                    <form method="get">
                        <label for="q" class="d-none"><?= lang('Blog.buttons.search') ?></label>
                        <div class="input-group">
                            <input class="form-control" id="q" name="q" placeholder="<?= lang('Blog.buttons.search') ?>" required />
                            <button class="btn btn-primary" type="submit"><?= lang('Blog.buttons.search') ?></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-12 col-md-10 col-lg-8">
                    <?= lang('Blog.status.showing', [$page, $posts['total_pages'], $posts['total_posts']]) ?>
                    <?php if ('tag' == $mode) : ?>
                        <br><?= lang('Blog.status.' . $mode, [$posts['tags'][$term]]) ?> | <a href="<?= base_url($locale . '/blog') ?>"><?= lang('Blog.buttons.clear') ?></a>
                    <?php elseif ('search' == $mode) : ?>
                        <br><?= lang('Blog.status.' . $mode, [$term]) ?> | <a href="<?= base_url($locale . '/blog') ?>"><?= lang('Blog.buttons.clear') ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col col-md-10 col-lg-8">
                    <?php if (empty($posts['posts'])) : ?>
                        <div class="alert alert-warning" role="alert">
                            <?= lang('Blog.no-result') ?>
                        </div>
                    <?php else : ?>
                        <?php foreach ($posts['posts'] as $post) : ?>
                            <div class="mb-3">
                                <h2 class="mb-3"><a href="<?= base_url($locale . '/blog/view/' . $post['slug']) ?>"><?= $post['title'] ?></a></h2>
                                <p>
                                    <?= lang('Blog.published', [format_post_date($post['date'], $locale)]) ?> |
                                    <?= lang('Blog.by', [$posts['authors'][$post['author']]]) ?>
                                    <?php if (!empty($post['tag_ids'])) : ?>
                                        | <?= lang('Blog.tags') ?>
                                        <?php foreach ($post['tag_ids'] as $tag_id) : ?>
                                            <?php if (isset($posts['tags'][$tag_id])) : ?>
                                                <a href="<?= base_url($locale . '/blog?tag=' . $tag_id) ?>" class="badge bg-warning"><?= $posts['tags'][$tag_id] ?></a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </p>
                                <?php if (0 < $post['featured_image'] && isset($posts['media'][$post['featured_image']])) : ?>
                                    <div class="float-end ms-3 mb-3" style="max-width:30%">
                                        <a href="<?= base_url($locale . '/blog/view/' . $post['slug']) ?>"><img src="<?= $posts['media'][$post['featured_image']] ?>" alt="<?= $post['title'] ?>" class="img-fluid img-thumbnail img-blog-thumbnail" /></a>
                                    </div>
                                <?php endif; ?>
                                <div class="blog-excerpt my-2"><?= $post['excerpt'] ?></div>
                                <div class="my-2"><a href="<?= base_url($locale . '/blog/view/' . $post['slug']) ?>"><?= lang('Blog.read-more') ?></a></div>
                                <hr class="my-5" style="clear: both" />
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <!-- PREV -->
                    <?php
                    $filter = '';
                    if ('search' == $mode) {
                        $filter = 'q=' . $term;
                    } else if ('tag' == $mode) {
                        $filter = 'tag=' . $term;
                    }
                    ?>
                    <?php if (1 == $page) : ?>
                        <?= lang('Blog.buttons.previous') ?>
                    <?php else : ?>
                        <a href="?<?= $filter ?>&p=<?= $page - 1 ?>"><?= lang('Blog.buttons.previous') ?></a>
                    <?php endif; ?>
                    <!-- CURRENT PAGE -->
                    | <?= lang('Blog.page', [$page]) ?> |
                    <!-- NEXT -->
                    <?php if ($posts['total_pages'] >= $page + 1) : ?>
                        <a href="?<?= $filter ?>&p=<?= $page + 1 ?>"><?= lang('Blog.buttons.next') ?></a>
                    <?php else: ?>
                        <?= lang('Blog.buttons.next') ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php
$this->endSection();
?>