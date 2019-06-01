<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start();

$product = $_POST['productId'];

$sql = "DELETE FROM prodotti WHERE id_prodotto = $product";
$mysqli->query($sql);

?>
