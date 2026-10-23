<h1>strings</h1>

<?php
$str1 = "PHP";
$str2 = "Laravel";

$len1 = strlen($str1);
$len2 = strlen($str2);

$saoIguais = ($str1 === $str2);
?>

<p>Primeira string: <strong><?php echo $str1; ?></strong> (Tamanho: <?php echo $len1; ?>)</p>
<p>Segunda string: <strong><?php echo $str2; ?></strong> (Tamanho: <?php echo $len2; ?>)</p>

<p><strong>São iguais?</strong> <?php echo $saoIguais ? 'Sim' : 'Não'; ?></p>