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
  if(isset($_FILES['foto'])){
      if (file_exists($_FILES['foto']['tmp_name'])) {
        $imagename = $_FILES['foto']['name'];
        $check = getimagesize($_FILES['foto']['tmp_name']);
        if ($check !== false) {
          $image = $_FILES['foto']['tmp_name'];
          $imgContent = addslashes(file_get_contents($image));
          $sql = "UPDATE fornitori SET nome = $nomeFornitore, cognome = $cognomeFornitore, logo = '$imgContent', telefono = $cellulare, nome_fornitore = $attivita, descrizione = $descrizioneEstesa, descrizione_breve = $descrizioneBreve WHERE id_fornitore = $currentId";
          $mysqli->query($sql);
        } else {
          echo "false";
        }
      } else {
        $sql = "UPDATE fornitori SET nome = $nomeFornitore, cognome = $cognomeFornitore, telefono = $cellulare, nome_fornitore = $attivita, descrizione = $descrizioneEstesa, descrizione_breve = $descrizioneBreve WHERE id_fornitore = $currentId";
        $mysqli->query($sql);
      }
  }
}

//CAMBIO PASSWORD
if(isset($_POST['newPw'], $_POST['oldPw'])){

    $oldPassword = $_POST['oldPw'];
    $newPassword = $_POST['newPw'];

    $sql = "SELECT email, password, salt FROM users WHERE user_id = {$_SESSION['user_id']}";
    $r = $mysqli->query($sql);
    $r = $r->fetch_assoc();
    $salt = $r['salt'];
    $dbPw = $r['password'];
    $email = $r['email'];
    $oldPassword = hash('sha512', $oldPassword.$salt); // codifica la password usando una chiave univoca.
    if($oldPassword == $dbPw) {
        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $password = $newPassword;
        $newPassword = hash('sha512', $newPassword.$random_salt);
        $sql = "UPDATE users  SET `password` = '".$newPassword."', salt = '".$random_salt."' WHERE user_id = {$_SESSION['user_id']}";
        $mysqli->query($sql);
        login($email, $password, $mysqli);
       } else {
       $_SESSION['change_error'] = "wrong";
       echo "ERROR";
   }

}
 ?>
