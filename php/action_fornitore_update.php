<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

if(isset($_POST['nomeFornitore'], $_POST['cognomeFornitore'], $_POST['cellulareFornitore'], $_POST['nomeAttivitaFornitore'], $_POST['indirizzoFornitore'], $_POST['descrizioneBreve'], $_POST['descrizioneEstesa'])){

  $nomeFornitore = "'".mysqli_real_escape_string($mysqli, $_POST['nomeFornitore'])."'";
  $cognomeFornitore = "'".mysqli_real_escape_string($mysqli, $_POST['cognomeFornitore'])."'";
  $attivita = "'".mysqli_real_escape_string($mysqli, $_POST['nomeAttivitaFornitore'])."'";
  $indirizzo = "'".mysqli_real_escape_string($mysqli, $_POST['indirizzoFornitore'])."'";
  $descrizioneBreve = "'".mysqli_real_escape_string($mysqli, $_POST['descrizioneBreve'])."'";
  $descrizioneEstesa = "'".mysqli_real_escape_string($mysqli, $_POST['descrizioneEstesa'])."'";

  $cellulare = $_POST['cellulareFornitore'];
  $currentId = $_SESSION['user_id'];

  if (file_exists($_FILES['fornitoreLogo']['tmp_name'])) {
    $imagename = $_FILES['fornitoreLogo']['name'];
    $check = getimagesize($_FILES['fornitoreLogo']['tmp_name']);
    if ($check !== false) {
      $image = $_FILES['fornitoreLogo']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $sql = "UPDATE fornitori SET nome = $nomeFornitore, cognome = $cognomeFornitore, logo = '$imgContent', telefono = $cellulare, nome_fornitore = $attivita, descrizione = $descrizioneEstesa, descrizione_breve = $descrizioneBreve WHERE id_fornitore = $currentId";
      $mysqli->query($sql);
    } else {
      echo "false";
    }
    //header('Location: /unihungry/php/ProfiloFornitore.php');
  } else {
    $sql = "UPDATE fornitori SET nome = $nomeFornitore, cognome = $cognomeFornitore, telefono = $cellulare, nome_fornitore = $attivita, descrizione = $descrizioneEstesa, descrizione_breve = $descrizioneBreve WHERE id_fornitore = $currentId";
    $mysqli->query($sql);
    //header('Location: /unihungry/php/ProfiloFornitore.php');
  }
} else {
  echo "NOT SET";
}

if (isset($_POST['giorno'], $_POST['start'], $_POST['end'])) {
  $day = $_POST['giorno'];
  $startTime = $_POST['start'].":00";
  $endTime = $_POST['end'].":00";
}
 ?>
