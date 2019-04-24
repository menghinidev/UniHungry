<<?php
// Recupero la password criptata dal form di inserimento e lo userType
$password = $_POST['pw'];
$user_type = $_POST['user_type'];
// Crea una chiave casuale
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
// Crea una password usando la chiave appena creata.
$password = hash('sha512', $password.$random_salt);
// Inserisci a questo punto il codice SQL per eseguire la INSERT nel tuo database
// Assicurati di usare statement SQL 'prepared'.
if ($insert_stmt = $mysqli->prepare("INSERT INTO users  email, password, salt, user_type) VALUES (?, ?, ?, ?)")) {
   $insert_stmt->bind_param('ssss', $email, $password, $random_salt, $user_type);
   // Esegui la query ottenuta.
   $insert_stmt->execute();
} ?>
