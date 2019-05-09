<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
if(isset($_POST['email'], $_POST['pw'])) {
   $email = $_POST['email'];
   $password = $_POST['pw']; // Recupero la password criptata.
   if(login($email, $password, $mysqli) == true) {
      header('Location: ../php/HomePage.php');
  }
} else {
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
}
?>
