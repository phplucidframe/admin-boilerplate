<?php _app('view')->block('header') ?>

<h4><?php echo _t($pageTitle); ?></h4>

<div id="buttonZone">
    <a href="<?php echo _url(_cfg('baseDir') . '/user/setup') ?>" class="button mini green"><?php echo _t('Add New User'); ?></a>
</div>

<div id="list"></div>

<!-- Confirm Warning Dialog -->
<div id="dialog-warning" class="dialog" title="<?php echo _t('Delete Restriction'); ?>" style="display:none">
    <div class="msg-body">
        <p class="center"><?php echo _t('You cannot delete the default user account.'); ?></p>
    </div>
</div>

<?php _app('view')->block('footer') ?>
