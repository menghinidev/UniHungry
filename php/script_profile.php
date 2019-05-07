<?php
require 'secure_func.php';
sec_session_start();
if($_SESSION['user_type'] == 'Admin'){
  header('Location: ./AdminPage.php');
}
 ?>
