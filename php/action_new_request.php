<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

if (isset($_POST['descrizione'], $_POST['categoria'])) {
  $categoria = "'".mysqli_real_escape_string($mysqli, $_POST['categoria'])."'";
  $descrizione = "'".mysqli_real_escape_string($mysqli, $_POST['descrizione'])."'";
  $id = $_SESSION['user_id'];
  $query = "INSERT INTO categorie (nome) VALUES ($categoria)";
  $correctQuery = "'".mysqli_real_escape_string($mysqli, $query)."'";
  $insertModifica = "INSERT INTO modifiche (oggetto, descrizione, query, id_fornitore) VALUES ('Aggiunta Categoria', $descrizione, $correctQuery, $id)";
  $mysqli->query($insertModifica);
  header('Location: ./ProfiloFornitore.php');
}

?>
