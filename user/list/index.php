<?php
$pageTitle = _t('Users');
?>
<!DOCTYPE html>
<html lang="<?php echo _lang(); ?>">
<head>
    <title><?php echo _title($pageTitle); ?></title>
    <?php _app('view')->block('head') ?>
</head>
<body>
    <?php include('view.php') ?>
</body>
</html>
<script type="text/javascript">
    $(function() {
        LC.Page.User.List.init();
    });
</script>
