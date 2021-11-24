<form method="post" id="frmLogin">
    <div class="box">
        <div class="logo">
            <img src="<?php echo _img('logo.png'); ?>" alt="<?php echo _cfg('siteName') ?>" />
        </div>
        <div class="form">
            <?php
            if ($msg = flash_get()) {
                echo $msg;
            } else { ?>
                <div class="message error"></div>
            <?php
            } ?>
            <div class="row">
                <div class="entry">
                    <input type="text" name="username" id="username" class="lc-form-input large full-width" placeholder="<?php echo _t('Username'); ?>" autofocus />
                </div>
            </div>
            <div class="row">
                <div class="entry pwd">
                    <input type="password" name="pwd" id="pwd" class="lc-form-input large full-width" placeholder="<?php echo _t('Password'); ?>" />
                    <a href="#" title="<?php echo _t('Forgot password?'); ?>">?</a>
                </div>
            </div>
            <div class="row">
                <div class="entry">
                    <button type="submit" class="button green large full-width" name="btn-login"><?php echo _t('Sign In'); ?></button>
                </div>
            </div>
            <div class="row center">
                <a href="<?php echo _url('home'); ?>"><?php echo _t('Back to Site'); ?></a>
            </div>
        </div>
    </div>
    <?php form_token(); ?>
</form>
