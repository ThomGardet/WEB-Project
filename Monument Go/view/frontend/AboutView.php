<?php $title = 'About'; ?>

<?php ob_start(); ?>

<link rel="stylesheet" type="text/css" href="public/css/AboutStyle.css" >

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . '/../template.php'); ?>