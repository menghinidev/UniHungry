<?php
include 'db_connect.php';
include 'secure_func.php';
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
        $query = "INSERT INTO ordini (data, ora_sottomissione, ora_richiesta, luogo_ritiro, stato_ordine, pagato, id_cliente, id_fornitore) VALUES ({$data}, {$ora_sottomissione}, {$ora_richiesta}, {$luogo}, {$stato_ordine} , false, {$_SESSION['user_id']}, {$F_id} )";
        if($mysqli->query($query)){
            $fornitori_ordini[$F_id] = $mysqli->insert_id;
        }
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
    //NOTIFICATIONS
    
    //EMAIL?
    header("Location: ../html/EndPoints/Confirm.html");
}

 ?>
