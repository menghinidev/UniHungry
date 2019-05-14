<?php
require 'secure_func.php';
sec_session_start();
if (isset($_SESSION['alert'])) {
  unset($_SESSION['alert']);
  echo "error";
} else {
  echo "ok";
}
 ?>
