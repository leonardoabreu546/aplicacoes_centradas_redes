<?php
require_once './classes/product.php';
session_start();

$id = $_GET['id'] ;

if ($id && isset($_SESSION['produtos'])) {
    foreach ($_SESSION['produtos'] as $index => $produto) {
        if ($produto->id == $id) {
            unset($_SESSION['produtos'][$key]);
            break;
        }
    }
}