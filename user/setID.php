<?php
session_start();
require 'functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
} elseif ($_SESSION["role"] !== 'user') {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["key"];
$href = $_GET["goto"];

if ($href == 'product') {
    $_SESSION["prdID"] = $id;
    header("Location: product.php");
    exit;
}

if ($href == 'store') {
    $_SESSION["storeID"] = $id;
    header("Location: store.php");
    exit;
}

if ($href == 'products') {
    $_SESSION["key"] = $id;
    header("Location: products.php");
    exit;
}
?>