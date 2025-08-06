<?php
$this->extend('_layout.php');
$this->section('content');
?>
<div class="container">
    <div class="row mt-5">
        <div class="col mt-5 pt-5">
            <h1>WP Pages</h1>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th colspan="2">Featured Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($pages as $page) : ?>
                    <tr>
                        <td><?= $page['id'] ?></td>
                        <td><?= $page['slug'] ?></td>
                        <td><?= $page['title']['rendered'] ?></td>
                        <td><?= $page['status'] ?></td>
                        <td>
                            <?php $this_photo = ''; ?>
                            <?php if (isset($page['featured_media_files'])) : ?>
                            <?php foreach ($page['featured_media_files'] as $key => $url) : ?>
                                <?= $key ?>
                                <?php $this_photo = $url; ?>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if (!empty($this_photo)) : ?><img src="<?= $this_photo ?>" style="max-width:200px" alt="<?= $page['title']['rendered'] ?>" /><?php endif; ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <h1>Categories</h1>
            <div class="table-responsive">
                <table class="table table-sm table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Slug</th>
                        <th>Title</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($categories as $id => $category) : ?>
                    <tr>
                        <td><?= $id ?></td>
                        <td><?= $category['slug'] ?></td>
                        <td>
                            <?php if (0 < $category['parent']) : ?>
                                <b><?= @$categories[$category['parent']]['name'] ?></b> / <?= $category['name'] ?>
                            <?php else : ?>
                                <b><?= $category['name'] ?></b>
                            <?php endif; ?>
                        </td>
                        <td><?= $category['count'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php
$this->endSection();
?>
