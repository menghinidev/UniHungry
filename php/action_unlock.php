<?php
require 'db_connect.php';
require 'secure_func.php';
include 'mail_composer.php';
sec_session_start();

$id = $_POST['id'];
$getEmail = "SELECT email FROM users WHERE user_id = $id";
$email = $mysqli->query($getEmail)->fetch_assoc()['email'];

$query="CALL unlock_user(?)";
$stmt = $mysqli->prepare($query);

$stmt->bind_param("s", $email);
$stmt->execute();

$newPassword = $_POST['pw'];

// Crea una chiave casuale
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
$password = $newPassword;
$newPassword = hash('sha512', $newPassword.$random_salt);
$sql = "UPDATE users  SET `password` = '".$newPassword."', salt = '".$random_salt."' WHERE user_id = $id";
$mysqli->query($sql);

utenteSbloccato($email, $password);
?>
