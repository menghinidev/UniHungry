<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

if(isset($_POST['idprodotto'], $_POST['nome'], $_POST['categoria'], $_POST['descrizione'], $_POST['prezzo'], $_POST['ingredienti'])){

  $nome = "'".mysqli_real_escape_string($mysqli, $_POST['nome'])."'";
  $categoria = "'".mysqli_real_escape_string($mysqli, $_POST['categoria'])."'";
  $descrizione = "'".mysqli_real_escape_string($mysqli, $_POST['descrizione'])."'";
  $ingredienti = "'".mysqli_real_escape_string($mysqli, $_POST['ingredienti'])."'";
  $currentId = $_POST['idprodotto'];

  $isUpdate = $mysqli->query("SELECT * FROM prodotti WHERE id_prodotto = $currentId");
  if($isUpdate->num_rows > 0){
    //UPDATE
    $sql = "UPDATE prodotti SET nome = $nome, categoria = $categoria, descrizione = $descrizione, prezzo_unitario = {$_POST['prezzo']}, ingredienti = $ingredienti WHERE id_prodotto = $currentId";
    $mysqli->query($sql);
    header('Location: CONFIRM');
  } else {
    //INSERT
    $id_fornitore = $_SESSION['user_id'];
    $sql = "INSERT INTO prodotti (nome, descrizione, prezzo_unitario, ingredienti, id_fornitore, categoria) VALUES (?, ?, ?, ?, ?, ?)";
    if ($insert_stmt = $mysqli->prepare($sql)) {
    $insert_stmt->bind_param('ssisis', $_POST['nome'], $_POST['descrizione'], $_POST['prezzo'], $_POST['ingredienti'], $id_fornitore, $_POST['categoria']);
       if($insert_stmt->execute())
       {
           header('Location: INSERITO');
       }
   }
  }
} else {
  header('Location: ERROR');
}
 ?>
