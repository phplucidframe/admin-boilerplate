<?php
auth_prerequisite();
$pageTitle = _t('Sign In');
?>
<!DOCTYPE html>
<html lang="<?php echo _lang(); ?>">
<head>
    <title><?php echo _title($pageTitle); ?></title>
    <?php _app('view')->block('head') ?>
</head>
<body class="mini-page">
    <?php include('view.php') ?>
</body>
</html>
