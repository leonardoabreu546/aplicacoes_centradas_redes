<?php
require_once 'classes/product.php';
session_start();

$id = $_GET['id'] ?? null;

if ($id && isset($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $produto) {
        if ($produto->id == $id) {
            $produto->stock++;
            break;
        }
    }
}

header('Location: ./index.php');
exit;