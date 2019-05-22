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
        $tot = 0;
        if(isset($_SESSION['cart'])){
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

            foreach($products_array as $id => $p){
                $tot += $p['prezzo_unitario'] * $_SESSION['cart'][$id];
            }
        }
        echo $tot;
    }

    if($action == "removeProduct"){
        $id = $_POST['idProdotto'];
        $old = $_SESSION['cart'][$id];
        //remove the product from cart
        unset($_SESSION['cart'][$id]);
        //update fornitore count
        $remove = false;
        $_SESSION['fornitori'][$_POST['idFornitore']] -= $old;
        if($_SESSION['fornitori'][$_POST['idFornitore']] == 0){
            //remove fornitore
            unset($_SESSION['fornitori'][$_POST['idFornitore']]);
            $remove = true;
        }
        //update total count
        $_SESSION['tot_products'] -= $old;
        $fornitori = count($_SESSION['fornitori']);
        if($_SESSION['tot_products'] == 0){
        //UNSET CART
        unset($_SESSION['cart']);
        unset($_SESSION['fornitori']);
        unset($_SESSION['tot_products']);
        }
        echo $fornitori.",".$remove;
    }
}

 ?>
