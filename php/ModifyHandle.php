<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$status = $_POST['status'];
$id = $_POST['id'];
require 'mail_composer.php';
$sql = "SELECT id_fornitore FROM modifiche WHERE id_modifica = $id";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$id_fornitore = $row['id_fornitore'];
$sql = "SELECT email FROM users  WHERE user_id = $id_fornitore ";
$result = $mysqli->query($sql);
$row = $result->fetch_assoc();
$email = $row['email'];
if($status == "Approved") {
  $sql = "UPDATE modifiche SET approvata = 1 WHERE id_modifica = $id";
  $mysqli->query($sql);
  $querymodifica = "SELECT query FROM modifiche WHERE id_modifica = $id";
  $result = $mysqli->query($querymodifica);
  $row = $result->fetch_assoc();
  $mysqli->query($row['query']);
  conferma_fornitore($email);

} else {
  $sql = "UPDATE modifiche SET approvata = 0 WHERE id_modifica = $id";
  $result = $mysqli->query($sql);
  rifiuta_fornitore($email);
}
 ?>
