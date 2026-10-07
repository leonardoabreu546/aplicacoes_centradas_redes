<?php
// 3.5 Inclui o ficheiro de inicialização
include 'initialize.php';
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title><?php echo getPageName(); ?></title>
</head>
<body>

    <!-- 3.7 Desenha o menu com os links -->
    <?php renderMenu(); ?>

    <hr>

    <!-- 3.8 Inclui a página selecionada (.php) -->
    <?php 
    $page_file = PAGES[$current_page] . '.php';
    include $page_file;
    ?>

</body>
</html>