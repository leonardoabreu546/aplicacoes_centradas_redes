<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registo de Utilizador</h1>
    <form action="process_register.php" method="POST">
        <label for="username">Nome de Utilizador:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="password">Palavra-passe:</label>
        <input type="password" id="password" name="password" required><br><br>

        <input type="submit" value="Registar">
    </form>

    <br>
    <a href="index.php">Voltar à Página Inicial</a>
</body>
</html>