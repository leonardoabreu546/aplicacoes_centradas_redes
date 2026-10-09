<?php
require_once 'classes/product.php';

session_start();

// Executa a sincronização do contador $lastId com a sessão
Product::initClass(); 

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [];
}
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
    <meta charset="UTF-8">
    <title>Exercício 3</title>
</head>
<body>

    <!-- Título principal da página -->
    <h1>Exercício 3</h1>

    <!-- Link para navegar para a página de criação de produto -->
    <p>
        <a href="./product.php">Novo Produto</a>
    </p>

    <!-- Lista com os produtos guardados -->
    <ul>
        <?php
        // Percorremos cada produto guardado no array da sessão
        foreach ($_SESSION['products'] as $produto) {
            // Chamamos o método da classe que gera o <li> de cada produto
            echo $produto->renderListItem();
        }
        ?>
    </ul>

    <hr>

    <!-- Link para apagar a sessão -->
    <p>
        <a href="./clear.php">Limpar Sessão</a>
    </p>

</body>
</html>
