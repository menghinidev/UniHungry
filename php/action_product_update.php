<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

if(isset($_POST['idprodotto'], $_POST['nome'], $_POST['categoria'], $_POST['descrizione'], $_POST['prezzo'], $_POST['ingredienti'])){

  $nome = "'".mysqli_real_escape_string($mysqli, $_POST['nome'])."'";
  $categoria = "'".mysqli_real_escape_string($mysqli, $_POST['categoria'])."'";
  $descrizione = "'".mysqli_real_escape_string($mysqli, $_POST['descrizione'])."'";
  $ingredienti = "'".mysqli_real_escape_string($mysqli, $_POST['ingredienti'])."'";

  $isUpdate = $mysqli->query("SELECT * FROM prodotti WHERE id_prodotto = 1");
  if($isUpdate->num_rows != 0){
    //UPDATE
    $mysqli->query("UPDATE prodotti SET nome = $nome, categoria = $categoria, descrizione = $descrizione, prezzo = {$_POST['prezzo']}, ingredienti = $ingredienti WHERE id_prodotto = ".$_POST['idprodotto']."");

    header('Location: CONFIRM');
  } else {
    //INSERT
    $mysqli->query("");
  }
} else {
  header('Location: ERROR');
}
 ?>
