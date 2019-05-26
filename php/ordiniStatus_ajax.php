<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_POST['action']),$_POST['id_ordine']){
    $action = $_POST['action'];
    $id = $_POST['id_ordine'];
    $param = "";
    if($action == 'accetta'){
        $param = 'accettato';
    }

    if($action == 'rifiuta'){
        $param = 'rifiutato';
    }

    if($action == 'completato'){
        $param = 'in consegna';
    }

    if($action == 'consegnato'){
        $param = 'consegnato';
        $sql = "UPDATE ordini SET pagato = true WHERE id_ordine = {$id} ";
        $mysqli->query($sql);
    }

    $sql = "UPDATE ordini SET stato_ordine = {$param} WHERE id_ordine = {$id} ";
    $mysqli->query($sql);
}
?>
