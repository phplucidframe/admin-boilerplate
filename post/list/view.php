<?php _app('view')->block('header') ?>

<h4><?php echo $pageTitle; ?></h4>

<?php _app('view')->block('language-selection'); ?>

<div id="buttonZone">
    <a href="<?php echo _url(_cfg('baseDir') . '/post/setup') ?>" class="button mini green"><?php echo _t('Add New Post'); ?></a>
</div>

<div id="list"></div>

<?php _app('view')->block('footer') ?>
