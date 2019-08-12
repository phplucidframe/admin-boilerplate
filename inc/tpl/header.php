<?php
/**
 * Header template file
 */
?>
<div id="wrapper">
    <div id="page-container">
        <div id="top-bar">
            <a href="<?php echo _url('home'); ?>"><?php echo _t('Visit Site'); ?></a>
            <ul id="user-menu">
                <li class="greeting">Hello, <?php echo $_auth->fullName; ?></li>
                <li>
                    <a href="<?php echo _url(_cfg('baseDir') . '/user/setup/', array($_auth->uid)); ?>"><?php echo _t('Edit My Account'); ?></a>
                </li>
                <li>
                    <a href="#"><?php echo _t('Change Password'); ?></a>
                </li>
                <li>
                    <a href="<?php echo _url(_cfg('baseDir') . '/logout', array($_auth->timestamp)); ?>"><?php echo _t('Logout'); ?></a>
                </li>
            </ul>
        </div>
        <div id="header">
            <div class="container clearfix">
                <a href="<?php echo _url('home'); ?>" id="logo"><?php echo _cfg('siteName'); ?></a>
                <ul id="menu" class="clearfix">
                    <li>
                        <a href="<?php echo _url(_cfg('baseDir') . '/post'); ?>" <?php if (_arg(1) == 'post') echo 'class="active"'; ?>><?php echo _t('Posts'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo _url(_cfg('baseDir') . '/category'); ?>" <?php if (_arg(1) == 'category') echo 'class="active"'; ?>><?php echo _t('Categories'); ?></a>
                    </li>
                    <?php if (auth_isAdmin()) { ?>
                    <li>
                        <a href="<?php echo _url(_cfg('baseDir') . '/user'); ?>" <?php if (_arg(1) == 'user') echo 'class="active"'; ?>><?php echo _t('Users'); ?></a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div id="page">
            <div class="container">
