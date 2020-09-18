<?php include( _i('inc/tpl/header.php') ); ?>
<h4><?php echo $pageTitle; ?></h4>
<?php
if ($id) {
    include( APP_ROOT . _cfg('baseDir') . '/inc/language-selection.php' );
}
?>
<div class="table clear">
    <form method="post" id="frmPost" name="frmPost" action="<?php echo _url(_cfg('baseDir') . '/post/setup/action.php'); ?>">
        <input type="hidden" name="hidLang" value="<?php echo $lang; ?>" />
        <input type="hidden" name="hidEditId" id="hidEditId" value="<?php echo $id; ?>" />
        <div class="message error"></div>
        <div class="row">
            <label><?php echo _t('Title').' ('._langName($lang).')'.$lc_reqSign; ?></label>
            <div><input type="text" name="txtTitle" id="txtTitle" value="<?php echo $post->title;?>" class="<?php echo $lang; ?> fluid-100" /></div>
        </div>
        <?php if (auth_isAdmin() && $lang == $lc_defaultLang) { ?>
        <div class="row">
            <label><?php echo _t('Slug'); ?> (<?php echo _t("Leave blank unless you want to customize this"); ?>)</label>
            <div><input type="text" name="txtSlug" id="txtSlug" class="fluid-100" value="<?php echo $post->slug;?>"></div>
        </div>
        <?php } ?>
        <div class="row">
            <label><?php echo _t('Category') . $lc_reqSign; ?></label>
            <div>
                <select name="cboCategory" class="<?php echo $lang; ?> fluid-100">
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
            <label><?php echo _t('Body').' ('._langName($lang).')' . $lc_reqSign; ?></label>
            <div>
                <textarea id="txtBody" name="txtBody" rows="15" class="<?php echo $lang; ?> fluid-100"><?php echo $post->body; ?></textarea>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="submit button green" id="btnSave" name="btnSave"><?php echo _t('Save'); ?></button>
            <a href="<?php echo _url(_cfg('baseDir') . '/post/list'); ?>">
                <button type="button" class="button" id="btnCancel" name="btnCancel"><?php echo _t('Cancel'); ?></button>
            </a>
        </div>
        <?php form_token(); ?>
    </form>
</div>
<?php include( _i('inc/tpl/footer.php') ); ?>
