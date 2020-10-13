<?php include( _i('inc/tpl/header.php') ); ?>
<div class="block full-width">
    <h3><?php echo _t($pageTitle); ?></h3>
    <div class="content-box">
        <form method="post" name="frmUser" id="frmUser">
            <input type="hidden" name="hidEditId" id="hidEditId" value="<?php echo $id; ?>" />
            <div class="message error"></div>
            <div class="fluid-45">
                <table cellpadding="0" cellspacing="0" class="form fluid">
                    <tr>
                        <td class="label"><?php echo _t('Full Name') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtFullName" id="txtFullName" value="<?php echo $user->full_name; ?>" class="fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Username') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtUsername" id="txtUsername" value="<?php echo $user->username; ?>" class="fluid-100" />
                        </td>
                    </tr>
                    <?php if (!$id): ?>
                        <tr class="tdPassword">
                            <td class="label"><?php echo _t('Password') ?> <span class="required">*</span></td>
                            <td class="labelSeparator">:</td>
                            <td class="entry">
                                <input type="password" name="txtPwd" id="txtPwd" class="fluid-100" />
                            </td>
                        </tr>
                        <tr class="tdPassword">
                            <td class="label"><?php echo _t('Confirm Password') ?> <span class="required">*</span></td>
                            <td class="labelSeparator">:</td>
                            <td class="entry">
                                <input type="password" name="txtConfirmPwd" id="txtConfirmPwd" class="fluid-100" />
                            </td>
                        </tr>
                    <?php endif ?>
                    <tr>
                        <td class="label"><?php echo _t('Email') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $user->email ?>" class="fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Role') ?> <span class="required">*</span></td>
                        <td class="labelSeparator">:</td>
                        <td class="entry">
                            <select name="cboRole" class="fluid-100">
                                <option value="editor" <?php echo form_selected('cboRole', $user->role, 'editor') ?>>Editor</option>
                                <option value="admin" <?php echo form_selected('cboRole', $user->role, 'admin') ?>>Administrator</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <td class="entry">
                            <button type="submit" class="button green" id="btnSave" name="btnSave"><?php echo _t('Save'); ?></button>
                            <button type="button" class="button" id="btnCancel" name="btnCancel"><?php echo _t('Cancel'); ?></button>
                        </td>
                    </tr>
                </table>
            </div>
            <?php form_token(); ?>
        </form>
    </div>
    <div id="block-foot"></div>
</div>
<?php include( _i('inc/tpl/footer.php') ); ?>
