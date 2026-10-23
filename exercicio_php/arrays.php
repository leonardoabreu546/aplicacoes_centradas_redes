<h1>arrays</h1>

<?php
// Array indexado
$indexado = ["Maçã", "Banana", "Laranja"];

// Array associativo
$associativo = [
    "nome" => "Leonardo",
    "curso" => "Engenharia Informática"
];

// O segundo parâmetro true faz o print_r devolver a string em vez de a imprimir diretamente
$outputIndexado = print_r($indexado, true);
$outputAssociativo = print_r($associativo, true);
?>

<h3>Array Indexado</h3>
<pre><?php echo $outputIndexado; ?></pre>

<h3>Array Associativo</h3>
<pre><?php echo $outputAssociativo; ?></pre>