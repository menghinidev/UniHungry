<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_POST['action'])){
    $action = $_POST['action'];
//SET SEEN
    if($action == 'update'){
        //variables
        $u_id = $_SESSION['user_id'];
        $newNum = 0;
        $html = "";
        $footer="<div class='dropdown-divider'></div>
        <a class='dropdown-item' href='./Notifications.php'>Mostra tutte le notifiche</a>";
        if(is_logged()){

            if($_SESSION['user_type'] == 'Cliente'){
                //cliente
                $sql = "SELECT N.* from notifiche N, ordini O WHERE O.id_ordine = N.id_ordine AND O.id_cliente = {$u_id} AND N.per_utente = true AND N.visualizzata=false ORDER BY N.id_notifica DESC";
                $res = $mysqli->query($sql);
                $newNum = $res->num_rows;
                if($newNum != 0){
                    while($n = $res->fetch_assoc()){
                        $html .= generate($n, true);
                    }
                }
                if($newNum < 5){
                    $limit = 5 - $res->num_rows;
                    $sql = "SELECT N.* from notifiche N, ordini O WHERE O.id_ordine = N.id_ordine AND O.id_cliente = {$u_id} AND N.per_utente = true AND N.visualizzata=true ORDER BY N.id_notifica DESC LIMIT $limit";
                    $res = $mysqli->query($sql);
                    $seenNum = $res->num_rows;
                    while($n = $res->fetch_assoc()){
                        $html .= generate($n, false);
                    }
                }
            } else {
                //fornitore
                $sql = "SELECT * FROM notifiche WHERE id_fornitore = {$u_id} AND per_utente = false AND visualizzata=false ORDER BY id_notifica DESC";
                $res = $mysqli->query($sql);
                $newNum = $res->num_rows;
                if($newNum != 0){
                    while($n = $res->fetch_assoc()){
                        $html .= generate($n, true);
                    }
                }
                if($newNum < 5){
                    $limit = 5 - $res->num_rows;
                    $sql = "SELECT * FROM notifiche WHERE id_fornitore = {$u_id} AND visualizzata=true ORDER BY id_notifica DESC LIMIT $limit";
                    $res = $mysqli->query($sql);
                    $seenNum = $res->num_rows;
                    while($n = $res->fetch_assoc()){
                        $html .= generate($n, false);
                    }
                }
            }
            if($newNum + $seenNum == 0){
                echo "0_<p class='dropdown-item'> Non sono presenti notifiche </p>";
                return;
            }
            //stick footer
            $html .= $footer;
            echo $newNum."_".$html;
        }
    }
//SET SEEN
    if($action == 'set_seen'){
        $sql = "UPDATE notifiche SET visualizzata = true WHERE id_notifica IN ";
        $range = "(";
        foreach($_POST['ids'] as $nId){
            $range .= $nId.",";
        }
        $range = substr($range, 0, -1);
        $range .=")";
        $sql .= $range;
        echo $mysqli->query($sql);
    }
}



function generate($n, $new){
        $nid= $n['id_notifica'];
        if($new){
            $prefix = "<a class='notify not-seen dropdown-item' id='notifica{$nid}'>";
        } else {
            $prefix = "<a class='notify dropdown-item' id='notifica{$nid}'>";
        }
        return $prefix.$n['testo']."</a>";
}
 ?>
