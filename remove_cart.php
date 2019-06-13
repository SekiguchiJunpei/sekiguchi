<?php
//本来はsidのissetチェック
$prod = $_GET["prod"];
session_start();
unset($_SESSION["cart"][$prod]);
//リダイレクト
header("Location: cart.php");

?>