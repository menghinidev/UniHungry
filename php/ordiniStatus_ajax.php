<?php
include 'db_connect.php';
include 'secure_func.php';
include 'mail_composer.php';
sec_session_start();
if(isset($_POST['action'] ,$_POST['id_ordine'])){
    $action = $_POST['action'];
    $id = $_POST['id_ordine'];
    $F_id = $_SESSION['user_id'];

    $fornitore = $mysqli->query("SELECT nome_fornitore FROM fornitori WHERE id_fornitore = $F_id")->fetch_assoc()['nome_fornitore'];
    $clienteID = $mysqli->query("SELECT id_cliente FROM ordini WHERE id_ordine =  $id")->fetch_assoc()['id_cliente'];
    $emailTo =  $mysqli->query("SELECT email FROM users WHERE user_id =$clienteID ")->fetch_assoc()['email'];

    $param = "";
    $text = "";
    if($action == 'accetta'){
        $param = 'accettato';
        $text = "Il tuo ordine ".$id." è stato accettato da ".$fornitore.".";

        ordineApprovato($emailTo, $id, $fornitore);
    }

    if($action == 'rifiuta'){
        $param = 'rifiutato';
        $text = "Il tuo ordine ".$id." è stato rifiutato da ".$fornitore.", provvederemo al più presto al rimborso se necessario";
    }

    if($action == 'completato'){
        $param = 'in consegna';
        $text = "Il tuo ordine ".$id." è ora in consegna! Presto ti verrà portato dove ci avevi chiesto.";
    }

    if($action == 'consegnato'){
        $param = 'consegnato';
        $text = "Il tuo ordine ".$id." è arrivato... Buon appetito!";
        $sql = "UPDATE ordini SET pagato = true WHERE id_ordine = {$id} ";
        $mysqli->query($sql);
    }
    $param = "'".mysqli_real_escape_string($mysqli,$param)."'";
    $sql = "UPDATE ordini SET stato_ordine = {$param} WHERE id_ordine = {$id} ";
    $mysqli->query($sql);
    //send notification
    $text = "'".mysqli_real_escape_string($mysqli,$text)."'";
    date_default_timezone_set('Europe/Rome');
    $date = date("Y-m-d H:i:s");
    $date = "'".mysqli_real_escape_string($mysqli,$date)."'";
    $query ="INSERT INTO notifiche (testo, visualizzata, per_utente, id_fornitore, id_ordine, time_stamp) VALUES($text, false, true, {$F_id}, {$id}, {$date})";
    $mysqli->query($query);
} else {
    echo "error";
}
?>
