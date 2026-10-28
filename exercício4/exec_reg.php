<?php
// Recolher os dados enviados por POST pelo formulário
$username = $_POST['username'] ?? '';
$name = $_POST['name'] ?? '';
$address = $_POST['address'] ?? '';
$email = $_POST['email'] ?? '';

if (!empty($username) && !empty($name) && !empty($address) && !empty($email)) {
    try {
        // Ligação à base de dados acr05 (ajusta o utilizador/password se necessário, ex: root e sem password no Laragon)
        $pdo = new PDO('mysql:host=localhost;dbname=acr05;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Executar a stored procedure create_new_user pedida na ficha
        $stmt = $pdo->prepare("CALL create_new_user(:username, :name, :address, :email)");
        $stmt->execute([
            'username' => $username,
            'name' => $name,
            'address' => $address,
            'email' => $email
        ]);

        // Se correr bem, volta ao index com created=true
        header("Location: index.php?created=true");
        exit();

    } catch (PDOException $e) {
        echo "Erro na base de dados: " . $e->getMessage();
    }
} else {
    echo "Por favor, preenche todos os campos.";
}
?>