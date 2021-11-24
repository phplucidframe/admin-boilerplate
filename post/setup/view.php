<h4><?php echo $pageTitle; ?></h4>
<?php
if ($id) {
    _app('view')->block('language-selection');
}
?>
<div class="table clear">
    <form method="post" id="form-post" name="form-post">
        <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
        <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
        <div class="message error"></div>
        <div class="row">
            <label for="title"><?php echo _t('Title').' ('._langName($lang).')' ?> <span class="required">*</span></label>
            <div>
                <input type="text" name="title" id="title" value="<?php echo $post->title_i18n ?>" class="<?php echo $lang; ?> lc-form-input fluid-100" />
            </div>
        </div>
        <?php if (auth_isAdmin() && $lang == _defaultLang()): ?>
        <div class="row">
            <label for="slug"><?php echo _t('Slug'); ?> (<?php echo _t("Leave blank unless you want to customize this"); ?>)</label>
            <div>
                <input type="text" name="slug" id="slug" class="lc-form-input fluid-100" value="<?php echo $post->slug;?>">
            </div>
        </div>
        <?php endif ?>
        <div class="row">
            <label for="category"><?php echo _t('Category') ?> <span class="required">*</span></label>
            <div>
                <select name="category" id="category" class="<?php echo $lang; ?> lc-form-input fluid-100">
                    <option value=""><?php echo _t('Select Category'); ?></option>
                    <?php foreach ($categories as $category): ?>
                        <?php $category = _getTranslationStrings($category, 'name', $lang) ?>
                        <option value="<?php echo $category->id; ?>"
                            <?php echo form_selected('cboCategory', $category->id, $post->cat_id); ?>>
                            <?php echo $category->name_i18n; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <label for="body"><?php echo _t('Body').' ('._langName($lang).')' ?> <span class="required">*</span></label>
            <div>
                <textarea id="body" name="body" rows="15" class="<?php echo $lang; ?> lc-form-input fluid-100"><?php echo $post->body_i18n ?></textarea>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="submit button green" id="btn-save" name="btn-save"><?php echo _t('Save'); ?></button>
            <a href="<?php echo _url(_cfg('baseDir') . '/post/list', array('lang' => $lang)); ?>" class="button"><?php echo _t('Cancel'); ?></a>
        </div>
        <?php form_token(); ?>
    </form>
</div>
