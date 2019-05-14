<?php
require 'secure_func.php';
sec_session_start();
require 'db_connect.php';
login_check($mysqli);
$day = $_POST['selectedDay'];
$startTime = $_POST['inizio'].":00";
$endTime = $_POST['fine'].":00";
$id = $_SESSION['user_id'];
$correctDay = "'".mysqli_real_escape_string($mysqli, $day)."'";
$sql = "SELECT * FROM orari_giornalieri WHERE id_fornitore = $id AND giorno_settimana = $correctDay";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  $updateQuery = "UPDATE orari_giornalieri SET apertura = $startTime, chiusura = $endTime";
  //$mysqli->query($updateQuery);
  $test = $updateQuery;
} else {
  $insertQuery = "INSERT INTO orari_giornalieri (?,?,?,?) VALUES ($id, $correctDay, $startTime, $endTime)";
  //$mysqli->query($insertQuery);
  $test = $insertQuery;
}
$_SESSION['day'] = $day;
echo $test;
?>
