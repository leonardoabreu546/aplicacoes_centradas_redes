<?php
session_start();

// Limpa todas as variáveis de sessão
$_SESSION = [];

// Se a sessão estiver a usar cookies, apaga também o cookie da sessão
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destrói completamente a sessão no servidor
session_destroy();

header('Location: ./index.php');
exit;