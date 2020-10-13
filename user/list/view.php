<?php include( _i('inc/tpl/header.php')) ; ?>
<h4><?php echo _t($pageTitle); ?></h4>

<div id="buttonZone">
    <button type="button" class="button mini green" id="btnNew"><?php echo _t('Add New User'); ?></button>
</div>
<div id="list"></div>

<input type="hidden" id="hidDeleteId" value="" />
<!-- Confirm Delete Dialog -->
<div id="dialog-confirm" class="dialog" title="<?php echo _t('Confirm User Delete'); ?>" style="display:none">
    <div class="msg-body">
        <p class="center"><?php echo _t('Are you sure you want to delete?'); ?></p>
    </div>
</div>

<!-- Confirm Warning Dialog -->
<div id="dialog-warning" class="dialog" title="<?php echo _t('Delete Restriction'); ?>" style="display:none">
    <div class="msg-body">
        <p class="center"><?php echo _t('You cannot delete the default user account.'); ?></p>
    </div>
</div>
<?php include( _i('inc/tpl/footer.php') ); ?>
