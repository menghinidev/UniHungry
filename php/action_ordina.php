<?php
include 'db_connect.php';
include 'secure_func.php';
include 'mail_composer.php';
sec_session_start();
if(isset($_POST['luogo_ritiro'], $_POST['ora_ritiro'])){
    $sql = "SELECT P.id_prodotto, P.id_fornitore FROM prodotti P WHERE id_prodotto in (";
    foreach ($_SESSION['cart'] as $productID => $quantity){
    $sql = "$sql $productID,";
    }
    $sql = substr($sql, 0, -1);
    $sql = "$sql ) ORDER BY id_fornitore";
    $result = $mysqli->query($sql);
    $diversi = count($_SESSION['fornitori']);
    $products_array = array();
    while($product = $result->fetch_assoc()){
    $products_array[$product['id_prodotto']] = $product;
    }
    $fornitori_IDs = array_keys($_SESSION['fornitori']);
    $fornitori_ordini = array();

    $data = date("Y-m-d");
    $data = "'".mysqli_real_escape_string($mysqli,$data)."'";
    $ora_sottomissione = date("H:i:s");
    $ora_sottomissione =  "'".mysqli_real_escape_string($mysqli,$ora_sottomissione)."'";
    $ora_richiesta = "'".mysqli_real_escape_string($mysqli, $_POST['ora_ritiro'])."'";
    $stato_ordine = "ricevuto";
    $stato_ordine = "'".mysqli_real_escape_string($mysqli,$stato_ordine)."'";
    $luogo = "'".mysqli_real_escape_string($mysqli, $_POST['luogo_ritiro'])."'";

    foreach($fornitori_IDs as $F_id){
        if(isset($_POST['numero_carta'])){
            $pagato = true;
        } else {
            $pagato = false;
        }
        $query = "INSERT INTO ordini (data, ora_sottomissione, ora_richiesta, luogo_ritiro, stato_ordine, pagato, id_cliente, id_fornitore) VALUES ({$data}, {$ora_sottomissione}, {$ora_richiesta}, {$luogo}, {$stato_ordine} , $pagato, {$_SESSION['user_id']}, {$F_id} )";
        if($mysqli->query($query)){
            $fornitori_ordini[$F_id] = $mysqli->insert_id;
        }
        $emailTo = $mysqli->query("SELECT email FROM users WHERE user_id = $F_id")->fetch_assoc()['email'];
        nuovoOrdineRicevuto($emailTo, $fornitori_ordini[$F_id]);
        //Create notification for fornitore
        $testoNotifica ="Hai ricevuto un nuovo ordine! Id: ".$fornitori_ordini[$F_id];
        $testoNotifica = "'".mysqli_real_escape_string($mysqli,$testoNotifica)."'";
        date_default_timezone_set('Europe/Rome');
        $date = date("Y-m-d H:i:s");
        $date = "'".mysqli_real_escape_string($mysqli,$date)."'";
        $query ="INSERT INTO notifiche (testo, visualizzata, per_utente, id_fornitore, id_ordine, time_stamp) VALUES($testoNotifica, false, false, {$F_id}, {$fornitori_ordini[$F_id]}, {$date})";
        $mysqli->query($query);
    }
    foreach($products_array as $p){
        $id_prodotto = $p['id_prodotto'];
        $id_ordine = $fornitori_ordini[$p['id_fornitore']];
        $q = $_SESSION['cart'][$id_prodotto];
        $query = "INSERT INTO ordinazioni VALUES ($id_prodotto, $id_ordine ,$q )";
        $mysqli->query($query);
    }
    //UNSET CART
    unset($_SESSION['cart']);
    unset($_SESSION['fornitori']);
    unset($_SESSION['tot_products']);


    $_SESSION['endpoint'] = "Confirm";
    header("Location: ./EndPoint_Confirm.php");
}

 ?>
