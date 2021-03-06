<?php
$lang       = _getLang();
$pageTitle  = _t('Add New Post');
$id         = 0;
$id         = _arg(3);

if ($id) {
    $pageTitle = _t('Edit Post');
} else {
    if ($lang != _defaultLang()) {
        _redirect(_cfg('baseDir') . '/post/setup/', null, _defaultLang());
    }
}

include('query.php');
?>
<!DOCTYPE html>
<html lang="<?php echo _lang(); ?>">
<head>
    <title><?php echo _title($pageTitle); ?></title>
    <?php _app('view')->block('head') ?>
    <?php _css('base.'._getLang().'.css'); ?>
</head>
<body>
    <?php include('view.php') ?>
</body>
</html>
