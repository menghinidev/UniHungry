<?php
//UNSET CART WHEN ORDER CHECKED OUT
include 'db_connect.php';
include 'secure_func.php';
sec_session_start();
if(isset($_SESSION['cart']))
{
    if(isset($_SESSION['cart'][$_POST['idProdotto']])){
        $_SESSION['cart'][$_POST['idProdotto']] += 1;
    } else {
        $_SESSION['cart'][$_POST['idProdotto']] = 1;
    }
} else {
    $_SESSION['tot_products'] = 0;
    $cart = array();
    $cart[$_POST['idProdotto']] = 1;
    $_SESSION['cart'] = $cart;

}
$_SESSION['tot_products'] +=1;
echo $_SESSION['tot_products'];
?>
