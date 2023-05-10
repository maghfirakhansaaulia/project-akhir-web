<?php
session_start();

$q = $_REQUEST["q"];
if(!$_SESSION["cartPiD"]){
    $_SESSION["cartPiD"] = array($q);
}
if($_SESSION["cartPiD"]){
    $cart = $_SESSION["cartPiD"];
    $cart[] = $q;
    $cart = array_unique($cart);
    $_SESSION["cartPiD"] = $cart;
}
echo $q;

?>