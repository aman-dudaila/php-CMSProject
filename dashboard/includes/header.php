<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expensis User Dashboard</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="assets/bootstrap/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body> 
<?php 
    session_start(); 
    error_reporting(0);
?>
<div class="main-container">
    
    <?php 
    
    if( isset($_GET['action']) && $_GET['action'] == 'logout') {
        session_destroy();
        header('location:login.php');
    }
    if(!$_SESSION['id']) {
        header('location:login.php');
    }
?>
<?php include('connection.php'); ?>
<?php include('functions.php'); ?>
<?php include('sidebar.php') ?>
<div class="login-info d-flex">
        <div class="login-user mr-4">Hi : <?php echo $_SESSION['name']; ?></div>
        <div class="logout"><a href="index.php?action=logout"> Logout </a></div>
    </div>
    <div class="inner-pages mt-4 common_padding">