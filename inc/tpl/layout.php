<!DOCTYPE html>
<html lang="<?php echo _lang(); ?>">
<head>
    <title><?php echo _title(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="<?php echo _img('favicon.ico'); ?>" type="image/x-icon" />
    <?php _css('base.css'); ?>
    <?php _css('base.' . _lang() . 'css'); ?>
    <?php _css('responsive.css'); ?>
    <?php _css('custom.css'); ?>
    <?php _css('jquery.ui') ?>
    <?php _app('view')->headStyle() ?>
    <?php _js('jquery') ?>
    <?php _js('jquery.ui') ?>
    <?php _script() ?>
    <?php _js('LC.js') ?>
    <?php _app('view')->headScript() ?>
    <?php _js('app.js') ?>
</head>
<body>
    <div id="wrapper">
        <div id="page-container">
            <div id="top-bar" class="clearfix">
                <a href="<?php echo _url('home'); ?>" class="logo-sm" target="_blank"><?php echo _t('Visit Site'); ?></a>
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
                        <img src="<?php echo _img('logo-blue.png'); ?>" class="fluid" alt="<?php echo _cfg('siteName'); ?>" />
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
                    <?php _app('view')->load() ?>
                </div> <!-- .container -->
            </div> <!-- #page -->
            <div id="footer">
                <div class="container">
                    <div id="copyright" class="clearfix">
                        <span id="left">&copy; <?php echo date('Y'); ?></span>
                        <span id="right"><?php echo _cfg('siteName'); ?></span>
                    </div>
                    <ul class="social-icons">
                        <li><a href="https://fb.com/lucidframe.myanmar" class="fb" target="_blank">Facebook</a></li>
                        <li><a href="https://twitter.com/phplucidframe" class="tw" target="_blank">Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div> <!-- #page-container -->
    </div> <!-- #wrapper -->
</body>
</html>
