<?php _app('view')->block('header') ?>

<h4><?php echo $pageTitle; ?></h4>
<?php
if ($id) {
    _app('view')->block('language-selection');
}
?>
<div class="table clear">
    <form method="post" id="frmPost" name="frmPost" action="<?php echo _url(_cfg('baseDir') . '/post/setup/action.php'); ?>">
        <input type="hidden" name="hidLang" value="<?php echo $lang; ?>" />
        <input type="hidden" name="hidEditId" id="hidEditId" value="<?php echo $id; ?>" />
        <div class="message error"></div>
        <div class="row">
            <label><?php echo _t('Title').' ('._langName($lang).')' ?> <span class="required">*</span></label>
            <div>
                <input type="text" name="txtTitle" id="txtTitle" value="<?php echo $post->title_i18n ?>" class="<?php echo $lang; ?> lc-form-input fluid-100" />
            </div>
        </div>
        <?php if (auth_isAdmin() && $lang == _defaultLang()) { ?>
        <div class="row">
            <label><?php echo _t('Slug'); ?> (<?php echo _t("Leave blank unless you want to customize this"); ?>)</label>
            <div><input type="text" name="txtSlug" id="txtSlug" class="lc-form-input fluid-100" value="<?php echo $post->slug;?>"></div>
        </div>
        <?php } ?>
        <div class="row">
            <label><?php echo _t('Category') ?> <span class="required">*</span></label>
            <div>
                <select name="cboCategory" class="<?php echo $lang; ?> lc-form-input fluid-100">
                    <option value=""><?php echo _t('Select Category'); ?></option>
                    <?php
                    foreach ($categories as $category) {
                        $category = _getTranslationStrings($category, 'name', $lang);
                    ?>
                        <option value="<?php echo $category->id; ?>"
                            <?php echo form_selected('cboCategory', $category->id, $post->cat_id); ?>>
                            <?php echo $category->name_i18n; ?>
                        </option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row">
            <label><?php echo _t('Body').' ('._langName($lang).')' ?> <span class="required">*</span></label>
            <div>
                <textarea id="txtBody" name="txtBody" rows="15" class="<?php echo $lang; ?> lc-form-input fluid-100"><?php echo $post->body_i18n ?></textarea>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="submit button green" id="btnSave" name="btnSave"><?php echo _t('Save'); ?></button>
            <a href="<?php echo _url(_cfg('baseDir') . '/post/list', array('lang' => $lang)); ?>" class="button"><?php echo _t('Cancel'); ?></a>
        </div>
        <?php form_token(); ?>
    </form>
</div>

<?php _app('view')->block('footer') ?>
