<?php
require_once 'classes/product.php';
session_start();

Product::initClass(); // Sincroniza o contador $lastId com a sessão

$name = $_POST['name'];
$description = $_POST['description'];
$value = $_POST['value'];
$id = isset($_POST['id']) ? $_POST['id'] : null;

if ($id) {
    // É EDIÇÃO: Procurar o produto existente pelo ID
    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $produto) {
            if ($produto->id == $id) {
                $produto->name = $name;
                $produto->description = $description;
                $produto->value = $value;
                break;
            }
        }
    }
} else {
    // É CRIAÇÃO: Criar novo objeto e adicionar à sessão
    $newProduct = new Product($name, $description, $value);
    $_SESSION['products'][] = $newProduct;
    $_SESSION['lastId'] = Product::$lastId; // Atualiza o último ID na sessão
    
}

// Redireciona de volta para a lista principal
header('Location: ./index.php');
exit;