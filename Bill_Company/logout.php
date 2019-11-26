<?php 
session_start();
session_destroy();
header('location:login.php');
error_reporting(0);

?>