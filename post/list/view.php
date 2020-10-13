<?php include( _i('inc/tpl/header.php') ); ?>
<h4><?php echo $pageTitle; ?></h4>
<?php include( APP_ROOT . 'admin/inc/language-selection.php' ); ?>
<div id="buttonZone">
    <button type="button" class="button mini green" id="btnNew"><?php echo _t('Add New Post'); ?></button>
</div>

<div id="list"></div>

<input type="hidden" id="hidDeleteId" value="" />
<!-- Confirm Delete Dialog -->
<div id="dialog-confirm" class="dialog" title="<?php echo _t('Confirm Post Delete'); ?>" style="display:none">
    <div class="msg-body">
        <p class="center"><?php echo _t('Are you sure you want to delete?'); ?></p>
    </div>
</div>
<?php include( _i('inc/tpl/footer.php') ); ?>
