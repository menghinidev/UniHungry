<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_POST['count'])){
    $id = $_SESSION['user_id'];
    $sql = "SELECT * FROM ordini WHERE id_fornitore = $id AND stato_ordine!='rifiutato'";
    $first = true;
    if(isset($_POST['ricevuto']) && $_POST['ricevuto'] ){
        if($first){
            $sql .= " AND "."(";
            $first = false;
        } else {
            $sql .= " OR ";
        }
        $sql .= " stato_ordine = 'ricevuto'";
    }
    if(isset($_POST['accettato']) && $_POST['accettato']){
        if($first){
            $sql .= " AND "."(";
            $first = false;
        } else {
            $sql .= " OR ";
        }
        $sql .= " stato_ordine = 'accettato'";
    }
    if(isset($_POST['completato']) && $_POST['completato']){
        if($first){
            $sql .= " AND "."(";
            $first = false;
        } else {
            $sql .= " OR ";
        }
        $sql .= " stato_ordine = 'in consegna'";
    }
    if(isset($_POST['consegnato']) && $_POST['consegnato']){
        if($first){
            $sql .= " AND "."(";
            $first = false;
        } else {
            $sql .= " OR ";
        }
        $sql .= " stato_ordine = 'consegnato'";
    }
    if(!$first){
        $sql .= ")";
    }
    if(isset($_POST['date']) && $_POST['date'] != ""){
        $data = "'".mysqli_real_escape_string($mysqli, $_POST['date'])."'";
        $sql .= "AND data = $data";
    }
    $sql .=" ORDER BY data DESC, ora_richiesta DESC";
    $result = $mysqli->query($sql);
    if($result->num_rows != $_POST['count']){
        echo "true";
    } else {
        echo "false";
    }
} else {
    echo "ERROR";
}

 ?>
