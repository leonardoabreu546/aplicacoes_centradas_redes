<?php
require_once './classes/product.php';
session_start();

// Variáveis para preencher o formulário (começam vazias para novo produto)
$id = '';
$name = '';
$description = '';
$value = '';

// Se recebermos um ID pela URL (ex: product.php?id=1), estamos em modo de EDIÇÃO
if (isset($_GET['id'])) {
    $searchId = $_GET['id'];
    
    // Procuramos o produto correspondente no array da sessão
    if (isset($_SESSION['products'])) {
        foreach ($_SESSION['products'] as $produto) {
            if ($produto->id == $searchId) {
                $id = $produto->id;
                $name = $produto->name;
                $description = $produto->description;
                $value = $produto->value;
                break;
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Produto</title>
</head>
<body>

    <h1><?php echo $id ? 'Editar Produto' : 'Novo Produto'; ?></h1>

    <form action="./saveproduct.php" method="POST">
        <!-- Campo escondido para enviar o ID se estivemos a editar -->
        <?php if ($id): ?>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        <?php endif; ?>

        <p>
            <label for="name">Nome:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
        </p>

        <p>
            <label for="description">Descrição:</label><br>
            <textarea id="description" name="description" required><?php echo $description; ?></textarea>
        </p>

        <p>
            <label for="value">Valor (€):</label><br>
            <input type="number" step="0.01" id="value" name="value" value="<?php echo $value; ?>" required>
        </p>

        <p>
            <button type="submit">Guardar</button>
            <a href="./index.php">Voltar</a>
        </p>
    </form>

</body>
</html>