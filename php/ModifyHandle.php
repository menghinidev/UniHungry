<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$status = $_POST['status'];
$id = $_POST['id'];
if($status == "Approved") {
  $sql = "UPDATE modifiche SET approvata = 1 WHERE id_modifica = $id";
  $result = $mysqli->query($sql);
} else {
  $sql = "UPDATE modifiche SET approvata = 0 WHERE id_modifica = $id";
  $result = $mysqli->query($sql);
}
 ?>
