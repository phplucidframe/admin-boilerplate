<div class="block full-width">
    <h3><?php echo _t($pageTitle); ?></h3>
    <div class="content-box">
        <form method="post" name="form-user" id="form-user">
            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>" />
            <div class="message error"></div>
            <div class="fluid-45">
                <table class="form fluid">
                    <tr>
                        <td class="label"><?php echo _t('Full Name') ?> <span class="required">*</span></td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <input type="text" name="full_name" id="full_name" value="<?php echo $user->full_name; ?>" class="lc-form-input fluid-100" autofocus />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Username') ?> <span class="required">*</span></td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <input type="text" name="username" id="username" value="<?php echo $user->username; ?>" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Email') ?></td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <input type="email" name="email" id="email" value="<?php echo $user->email ?>" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr class="tdPassword">
                        <td class="label"><?php echo _t('Password') ?> </td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <input type="password" name="pwd" id="pwd" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr class="tdPassword">
                        <td class="label"><?php echo _t('Confirm Password') ?></td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <input type="password" name="confirm_pwd" id="confirm-pwd" class="lc-form-input fluid-100" />
                        </td>
                    </tr>
                    <tr>
                        <td class="label"><?php echo _t('Role') ?> <span class="required">*</span></td>
                        <td class="label-separator">:</td>
                        <td class="entry">
                            <select name="role" class="lc-form-input fluid-100">
                                <option value="admin" <?php echo form_selected('role', $user->role, 'admin') ?>>Administrator</option>
                                <option value="editor" <?php echo form_selected('role', $user->role, 'editor') ?>>Editor</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <td class="entry">
                            <button type="submit" class="button blue" id="btn-save" name="btn-save"><?php echo _t('Save'); ?></button>
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
