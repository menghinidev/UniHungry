<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_POST['action'])){
    $action = $_POST['action'];
    if($action == "setAllSeen"){
        $sql = "UPDATE notifiche SET visualizzata = true WHERE id_notifica IN ";
        $range = "(";
        foreach($_POST['ids'] as $nId){
            $range .= $nId.",";
        }
        $range = substr($range, 0, -1);
        $range .=")";
        $sql .= $range;
        echo $mysqli->query($sql);
        return;
    }

    if($action == "updateList"){
        $html = "";
        $u_id = $_SESSION['user_id'];
        $query = "";
        //get new notifications
        if($_SESSION['user_type'] == 'Fornitore'){
          $query="SELECT * FROM notifiche WHERE id_fornitore = {$u_id} AND per_utente = false AND visualizzata = false ORDER BY time_stamp DESC";
          } else {
          //Cliente
          $href = "#";
          $query="SELECT N.* from notifiche N, ordini O WHERE O.id_ordine = N.id_ordine AND visualizzata = false AND O.id_cliente = {$u_id} AND N.per_utente = true ORDER BY time_stamp DESC";
          }
        $notifications = $mysqli->query($query);
        if($notifications->num_rows != 0){
            while($n = $notifications->fetch_assoc()){
                $href="#";
                if($_SESSION['user_type'] == 'Fornitore'){
                    $href="./GestioneOrdini.php?oid={$n['id_ordine']}";
                } else {
                    $href="./ProfiloCliente.php?oid={$n['id_ordine']}";
                }
                $html .= '
                  <a id="notifica'.$n['id_notifica'].'" href="'.$href.'" class="row notify-row justify-content-between not-seen">
                      <div class="col-12">
                          '.$n['testo'].'
                      </div>
                      <div class="col text-right time">
                         '.date("d/m/y - H:i ", strtotime($n['time_stamp'])).'
                      </div>

                  </a>';
            }
        }
        echo $html;
        return;
    }
}
 ?>
