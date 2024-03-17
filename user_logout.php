<?php
session_start();
unset($_SESSION['USER_NAME']);
unset($_SESSION['id']);
unset($_SESSION['user']);

header('location:login.php');
die();
?>