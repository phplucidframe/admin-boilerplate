<h4><?php echo $pageTitle; ?></h4>

<div id="buttonZone">
    <button type="button" class="button mini blue" id="btn-new"><?php echo _t('Add New Category'); ?></button>
</div>

<div id="list"></div>

<!-- Category Entry Form -->
<div id="dialog-category" class="dialog" title="<?php echo _t('Category'); ?>">
    <form method="post" id="form-category">
        <div class="message error"></div>
        <input type="hidden" id="id" name="id" />
        <table class="form fluid">
            <tr>
                <td class="label">
                    <?php echo _t('Name'); ?>
                    <label class="lang">(<?php echo _langName(); ?>)</label>
                    <span class="required">*</span>
                </td>
                <td class="label-separator">:</td>
                <td class="entry">
                    <input type="text" name="name" id="name" class="lc-form-input fluid-100" />
                </td>
            </tr>
            <?php $langs = _langs(_defaultLang()); ?>
            <?php foreach ($langs as $lcode => $lname) { ?>
            <tr>
                <td class="label">
                    <?php echo _t('Name'); ?>
                    <?php if (_langName($lcode)) { ?>
                    <label class="lang">(<?php echo _langName($lcode); ?>)</label>
                    <?php } ?>
                </td>
                <?php $lcode = _queryLang($lcode); ?>
                <td class="label-separator">:</td>
                <td class="entry">
                    <input type="text" name="name_<?php echo $lcode; ?>" id="name-<?php echo $lcode; ?>" class="lc-form-input fluid-100" />
                </td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="2">
                <td class="entry">
                    <button type="submit" class="button jqbutton submit large blue" id="btn-save" name="btn-save">
                        <?php echo _t('Save') ?>
                    </button>
                    <button type="button" class="button jqbutton large" id="btn-cancel" name="btn-cancel">
                        <?php echo _t('Cancel') ?>
                    </button>
                </td>
            </tr>
        </table>
        <?php form_token(); ?>
    </form>
</div>

<script>
    $(function() {
        LC.Page.Category.init();
    });
</script>

