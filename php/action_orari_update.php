<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

$days = array();
$days = ['Lunedi', 'Martedi', 'Mercoledi', 'Giovedi', 'Venerdi', 'Sabato', 'Domenica'];

$id = $_SESSION['user_id'];

$size = sizeof($days);

for ($i = 0; $i < $size; $i++) {
  if (isset($_POST['start'.$days[$i]], $_POST['end'.$days[$i]])) {
    $apertura = "'".mysqli_real_escape_string($mysqli, $_POST['start'.$days[$i]].":00")."'";
    $chiusura = "'".mysqli_real_escape_string($mysqli, $_POST['end'.$days[$i]].":00")."'";
    $day = "'".mysqli_real_escape_string($mysqli, $days[$i])."'";
    $isToUpdate = defineUpdate($days[$i], $mysqli);
    if ($isToUpdate) {
      $sql = "UPDATE orari_giornalieri SET apertura = $apertura, chiusura = $chiusura, inizio_pausa = NULL, fine_pausa = NULL WHERE giorno_settimana = $day AND id_fornitore = $id";
    } else {
      $sql = "INSERT INTO orari_giornalieri (id_fornitore, giorno_settimana, apertura, chiusura) VALUES ($id, $day, $apertura, $chiusura)";
    }
    if (isset($_POST['startPausa'.$days[$i]], $_POST['endPausa'.$days[$i]])) {
      $inizioPausa = "'".mysqli_real_escape_string($mysqli, $_POST['startPausa'.$days[$i]].":00")."'";
      $finePausa = "'".mysqli_real_escape_string($mysqli, $_POST['endPausa'.$days[$i]].":00")."'";
      if ($isToUpdate) {
        $sql = "UPDATE orari_giornalieri SET apertura = $apertura, chiusura = $chiusura, inizio_pausa = $inizioPausa, fine_pausa = $finePausa WHERE giorno_settimana = $day AND id_fornitore = $id";
      } else {
        $sql = "INSERT INTO orari_giornalieri (id_fornitore, giorno_settimana, apertura, chiusura, inizio_pausa, fine_pausa) VALUES ($id, $day, $apertura, $chiusura, $inizioPausa, $finePausa)";
      }
    } else if(isset($_POST['startPausa'.$days[$i]]) || isset($_POST['endPausa'.$days[$i]])){
      $_SESSION['alert'] = true;
    }
    $mysqli->query($sql);
  } else if(isset($_POST['start'.$days[$i]]) || isset($_POST['end'.$days[$i]])){
    $_SESSION['alert'] = true;
  } else if(!isset($_POST['start'.$days[$i]]) && !isset($_POST['end'.$days[$i]])) {
    $day = "'".mysqli_real_escape_string($mysqli, $days[$i])."'";
    $sql = "DELETE FROM orari_giornalieri WHERE giorno_settimana = $day AND id_fornitore = $id";
    $mysqli->query($sql);
  }
}

if (isset($_SESSION['alert'])) {
  header('Location: ./Orari.php');
} else {
  header('Location: ./ProfiloFornitore.php');
}

function defineUpdate($day, $mysqli) {
  $day = "'".mysqli_real_escape_string($mysqli, $day)."'";
  $id = $_SESSION['user_id'];
  $sql = "SELECT * FROM orari_giornalieri WHERE id_fornitore = $id AND giorno_settimana = $day";
  $result = $mysqli->query($sql);
  if($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
}

?>
