<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
$_SESSION['should_login'] = true;
 ?>
