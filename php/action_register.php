<<?php
require 'db_connect.php';
require 'secure_func.php';
sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura
if(empty($_POST['email'], $_POST['pw'],$_POST['user_type'], $_POST['nome'] , $_POST['cognome'], $_POST['telefono'] )) {
    // Recupero i dati postati dal form
    $email = $_POST['email'];
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
       if($insert_stmt->execute())
       {
           $last_id = $mysqli->insert_id;
       }
    }
    #####INSERT PERSONAL DATA IN SPECIFIC TABLE#######

    if($user_type == "Cliente"){
        if ($insert_stmt = $mysqli->prepare("INSERT INTO clienti  id_cliente, nome, cognome, telefono) VALUES (?, ?, ?, ?)")) {
           $insert_stmt->bind_param('isss',$last_id ,$_POST['nome'] , $_POST['cognome'], $_POST['telefono']);
           // Esegui la query ottenuta.
           $insert_stmt->execute();
        }
    }
    else {
        ####CREARE MODIFICA DA SOTTOPORRE AD APPROVAZIONE ADMIN###
    }
}
else {
   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
   echo 'Invalid Request';
} ?>
