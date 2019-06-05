<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

$id = $_POST['id'];
$getEmail = "SELECT email FROM users WHERE user_id = $id";
$email = $mysqli->query($getEmail)->fetch_assoc()['email'];

$query="CALL unlock_user(?)";
$stmt = $mysqli->prepare($query);

$stmt->bind_param("s", $email);
$stmt->execute();

?>
