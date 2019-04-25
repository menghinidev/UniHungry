<?php
define("HOST", "localhost");
define("USER", "admin_user");
define("PASSWORD", "YavoZwYYUl");
define("DATABASE", "unihungry");
$mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
