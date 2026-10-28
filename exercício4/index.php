<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4 - ACR</title>
</head>
<body>
    <h1>Exercício 4 - Gestão de Utilizadores</h1>

    <?php
    if (isset($_GET['created']) && $_GET['created'] === 'true') {
        echo "<p style='color: green;'><strong>Utilizador criado com sucesso.</strong></p>";
    }
    ?>

    <ul>
        <li><a href="register.php">Registo</a></li>
        <li><a href="users.php">Lista de Utilizadores</a></li>
    </ul>
</body>
</html>