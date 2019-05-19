<?php
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_POST['action'])){
    $action = $_POST['action'];

    if($action == "changeQuantity"){
        $id = $_POST['idProdotto'];
        $q = $_POST['quantity'];
        $old = $_SESSION['cart'][$id];
        $_SESSION['cart'][$id] = $q;

        $_SESSION['fornitori'][$_POST['idFornitore']] += ($q - $old);

        $_SESSION['tot_products'] += ($q - $old);
    }

    if($action == "updateTotal"){
        $sql = "SELECT * FROM prodotti WHERE id_prodotto in (";
        foreach ($_SESSION['cart'] as $productID => $quantity){
            $sql = "$sql $productID,";
        }
        $sql = substr($sql, 0, -1);
        $sql = "$sql ) ORDER BY id_fornitore";
        $result = $mysqli->query($sql);
        $diversi = count($_SESSION['fornitori']);
        while($product = $result->fetch_assoc()){
            $products_array[$product['id_prodotto']] = $product;
        }
        $tot = 0;
        foreach($products_array as $id => $p){
            $tot += $p['prezzo_unitario'] * $_SESSION['cart'][$id];
        }
        echo $tot;
    }
}

 ?>
