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

if(isset($_POST['newPw'], $_POST['oldPw'])){

    $oldPassword = $_POST['oldPw'];
    $newPassword = $_POST['newPw'];

    $sql = "SELECT password, salt FROM users WHERE user_id = {$_SESSION['user_id']}";
    $r = $mysqli->query($sql);
    $r = $r->fetch_assoc();
    $salt = $r['salt'];
    $dbPw = $r['password'];
    $oldPassword = hash('sha512', $oldPassword.$salt); // codifica la password usando una chiave univoca.
    if($oldPassword == $dbPw) {
        // Crea una chiave casuale
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
        // Crea una password usando la chiave appena creata.
        $newPassword = hash('sha512', $newPassword.$random_salt);
        $sql = "UPDATE users  SET `password` = '".$newPassword."', salt = '".$random_salt."' WHERE user_id = {$_SESSION['user_id']}";
        $mysqli->query($sql);
       } else {
       $_SESSION['change_error'] = "wrong";
   }

}

header('Location: ../php/ProfiloCliente.php');


?>
