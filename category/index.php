<?php
$pageTitle = _t('Categories');
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
<script language="javascript">
$(function() {
    LC.Page.Category.init();
});
</script>
