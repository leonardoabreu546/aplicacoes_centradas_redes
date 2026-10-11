<?php
require_once './classes/product.php';
session_start();

$id = $_GET['id'] ;

if ($id && isset($_SESSION['products'])) {
    foreach ($_SESSION['products'] as $index => $produto) {
        if ($produto->id == $id) {
            unset($_SESSION['products'][$index]);
            $_SESSION['products'] = array_values($_SESSION['products']); // Reindexa o array
            break;
        }
    }
}

header('Location: ./index.php');
exit;