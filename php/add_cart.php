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
    if(isset($_SESSION['fornitori'][$_POST['idFornitore']])){
        $_SESSION['fornitori'][$_POST['idFornitore']] += 1;
    } else {
        $_SESSION['fornitori'][$_POST['idFornitore']] = 1;
    }

} else {
    $fornitori = array();
    $fornitori[$_POST['idFornitore']] = 1;
    $_SESSION['fornitori'] = $fornitori;

    $cart = array();
    $cart[$_POST['idProdotto']] = 1;
    $_SESSION['cart'] = $cart;
}
$tot = 0;
foreach($_SESSION['cart'] as $q){
    $tot +=$q;
}
$_SESSION['tot_products'] = $tot;
echo $tot;
?>
