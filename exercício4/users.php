<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=acr05;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Executar a stored procedure get_all_users
    $stmt = $pdo->prepare("CALL get_all_users()");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro na base de dados: " . $e->getMessage();
    $users = [];
}
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Lista de Utilizadores - Exercício 4</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <h1>Lista de Utilizadores</h1>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nome</th>
                <th>Morada</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['ID']) ?></td>
                        <td><?= htmlspecialchars($user['Username']) ?></td>
                        <td><?= htmlspecialchars($user['Name']) ?></td>
                        <td><?= htmlspecialchars($user['Address']) ?></td>
                        <td><?= htmlspecialchars($user['Email']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">Ainda não existem utilizadores registados.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <br>
    <a href="index.php">Voltar ao Menu</a>
</body>
</html>