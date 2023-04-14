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
<body class="mini-page">
    <div class="container-box">
        <?php _app('view')->load() ?>
    </div>
</body>
</html>
