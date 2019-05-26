<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

$nome = "'".mysqli_real_escape_string($mysqli, $_POST['nome'])."'";
$cognome = "'".mysqli_real_escape_string($mysqli, $_POST['cognome'])."'";
$telefono = $_POST['telefono'];
$id = $_SESSION['user_id'];

$update = "UPDATE clienti SET nome = $nome, cognome = $cognome, telefono = $telefono WHERE id_cliente = $id";
$mysqli->query($update);
header('Location: /unihungry/php/ProfiloCliente.php');

?>
