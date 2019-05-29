<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

$id = $_POST['idprodotto'];
$nome = "'".mysqli_real_escape_string($mysqli, $_POST['nome'])."'";
$categoria = "'".mysqli_real_escape_string($mysqli, $_POST['categoria'])."'";
$descrizione = "'".mysqli_real_escape_string($mysqli, $_POST['descrizione'])."'";
$ingredienti = "'".mysqli_real_escape_string($mysqli, $_POST['ingredienti'])."'";
$prezzo = $_POST['prezzo'];

$isUpdate = $mysqli->query("SELECT * FROM prodotti WHERE id_prodotto = $id");

if($isUpdate->num_rows > 0){
  //UPDATE
  if (file_exists($_FILES['foto']['tmp_name'])) {
    $imagename = $_FILES['foto']['name'];
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check !== false) {
      $image = $_FILES['foto']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $sql = "UPDATE prodotti SET nome = $nome, categoria = $categoria, immagine = '$imgContent', descrizione = $descrizione, prezzo_unitario = {$_POST['prezzo']}, ingredienti = $ingredienti WHERE id_prodotto = $id";
      $mysqli->query($sql);
    } else {

    }
  } else {
    $sql = "UPDATE prodotti SET nome = $nome, categoria = $categoria, descrizione = $descrizione, prezzo_unitario = $prezzo, ingredienti = $ingredienti WHERE id_prodotto = $id";
    $mysqli->query($sql);
  }
} else {
  //INSERT

  $id_fornitore = $_SESSION['user_id'];
  if (file_exists($_FILES['foto']['tmp_name'])) {
    $imagename = $_FILES['foto']['name'];
    $check = getimagesize($_FILES['foto']['tmp_name']);
    if ($check !== false) {
      $image = $_FILES['foto']['tmp_name'];
      $imgContent = addslashes(file_get_contents($image));
      $sql = "INSERT INTO prodotti (nome, descrizione, prezzo_unitario, immagine, ingredienti, id_fornitore, categoria) VALUES ($nome, $descrizione, $prezzo, '$imgContent', $ingredienti, $id_fornitore, $categoria)";
      $res = $mysqli->query($sql);
    } else {

    }
  } else {
    $sql = "INSERT INTO prodotti (nome, descrizione, prezzo_unitario, ingredienti, id_fornitore, categoria) VALUES ($nome, $descrizione, $prezzo, $ingredienti, $id_fornitore, $categoria)";
    $res = $mysqli->query($sql);
  }
}
?>
