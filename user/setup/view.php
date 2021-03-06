<?php _app('view')->block('header') ?>

<div class="block full-width">
    <h3><?php echo _t($pageTitle); ?></h3>
    <div class="content-box">
        <form method="post" name="frmUser" id="frmUser">
            <input type="hidden" name="hidEditId" id="hidEditId" value="<?php echo $id; ?>" />
            <div class="message error"></div>
            <div class="fluid-45">
                <table class="form fluid">
                    <tr>
                        <td class="label"><?php echo _t('Full Name') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtFullName" id="txtFullName" value="<?php echo $user->full_name; ?>" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Username') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtUsername" id="txtUsername" value="<?php echo $user->username; ?>" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <?php if (!$id): ?>
                        <tr class="tdPassword">
                            <td class="label"><?php echo _t('Password') ?> <span class="required">*</span></td>
                            <td class="labelSeparator">:</td>
                            <td class="entry">
                                <input type="password" name="txtPwd" id="txtPwd" class="lc-form-input fluid-100" />
                            </td>
                        </tr>
                        <tr class="tdPassword">
                            <td class="label"><?php echo _t('Confirm Password') ?> <span class="required">*</span></td>
                            <td class="labelSeparator">:</td>
                            <td class="entry">
                                <input type="password" name="txtConfirmPwd" id="txtConfirmPwd" class="lc-form-input fluid-100" />
                            </td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td class="label"><?php echo _t('Email') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $user->email ?>" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Role') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <select name="cboRole" class="lc-form-input fluid-100">
                                <option value="editor" <?php echo form_selected('cboRole', $user->role, 'editor') ?>>Editor</option>
                                <option value="admin" <?php echo form_selected('cboRole', $user->role, 'admin') ?>>Administrator</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <td class="entry">
                            <button type="submit" class="button green" id="btnSave" name="btnSave"><?php echo _t('Save'); ?></button>
                            <a href="<?php echo _url(_cfg('baseDir') . '/user') ?>" class="button"><?php echo _t('Cancel'); ?></a>
                        </td>
                    </tr>
                </table>
            </div>
            <?php form_token(); ?>
        </form>
    </div>
    <div id="block-foot"></div>
</div>

<?php _app('view')->block('footer') ?>
