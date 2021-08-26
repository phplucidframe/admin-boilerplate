<h4><?php echo $pageTitle; ?></h4>

<?php _app('view')->block('language-selection'); ?>

<div id="buttonZone">
    <a href="<?php echo _url(_cfg('baseDir') . '/post/setup') ?>" class="button mini green"><?php echo _t('Add New Post'); ?></a>
</div>

<div id="list"></div>

<script type="text/javascript">
    $(function() {
        LC.Page.Post.List.init('<?php echo _getLang() ?>');
    });
</script>
