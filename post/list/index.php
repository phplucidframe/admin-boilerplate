<?php
$pageTitle = _t('Posts');
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
<script type="text/javascript">
$(function() {
    LC.Page.Post.List.init('<?php echo _getLang();?>');
});
</script>
