<?php session_start() ?>
<?php include 'database.php'; ?>
<?php 
    if (isset($_SESSION['name'])){
        session_destroy();
        header('Location:login.php');
    }
?>