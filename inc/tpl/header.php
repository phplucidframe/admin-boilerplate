<?php
/**
 * Header template file
 */
?>
<div id="wrapper">
    <div id="page-container">
        <div id="top-bar" class="clearfix">
            <a href="<?php echo _url('home'); ?>"><?php echo _t('Visit Site'); ?></a>
            <div class="greeting mobile">Hello, <?php echo _app('auth')->full_name; ?></div>
            <ul id="user-menu" class="clearfix">
                <li class="greeting">Hello, <?php echo _app('auth')->full_name; ?></li>
                <li>
                    <a href="<?php echo _url(_cfg('baseDir') . '/user/setup/', array(_app('auth')->id)); ?>"><?php echo _t('Edit My Account'); ?></a>
                </li>
                <li>
                    <a href="#"><?php echo _t('Change Password'); ?></a>
                </li>
                <li>
                    <a href="<?php echo _url(_cfg('baseDir') . '/logout', array(_app('auth')->token)); ?>"><?php echo _t('Logout'); ?></a>
                </li>
            </ul>
        </div>
        <div id="header">
            <div class="container clearfix">
                <a href="<?php echo _url('home'); ?>" id="logo">
                    <img src="<?php echo _img('logo.png'); ?>" class="fluid" alt="<?php echo _cfg('siteName'); ?>" />
                </a>
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
