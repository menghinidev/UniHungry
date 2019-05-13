<?php
require 'secure_func.php';
sec_session_start();
$selected = $_POST['selectedDay'];
$_SESSION['day'] = $selected;
echo $_SESSION['day'];
?>
