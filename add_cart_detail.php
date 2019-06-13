<?php
$prod = $_GET["prod"];

session_start();
$cart = [];
if( isset( $_SESSION["cart"] ) ){
    $cart = $_SESSION["cart"];
}

$cart[$prod]++;

$_SESSION["cart"] = $cart;

header("Location: products_detail.php?prod=".$prod."");

?>