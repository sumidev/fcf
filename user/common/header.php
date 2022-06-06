<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/plugins/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="../assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="../assets/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="../assets/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- animation CSS -->
    <link href="../assets/css/animate.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="../assets/css/colors/blue.css" id="theme" rel="stylesheet">
</head>

<body>
<?php
    $user_data = $fcf->get_user_data($_SESSION['id'], $_SESSION['role']);
?>