<?php
require_once './classes/product.php';
session_start();

$id = $_GET['id'] ;

if ($id && isset($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $index => $produto) {
        if ($produto->id == $id) {
            unset($_SESSION['products'][$index]);
            break;
        }
    }
}