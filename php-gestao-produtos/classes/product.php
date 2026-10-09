<?php

class Product {
    // Propriedades públicas do objeto
    public $id;
    public $name;
    public $description;
    public $value;
    public $stock;

    // Propriedade estática para controlar o último ID atribuído
    public static $lastId = 0;

    // Construtor: recebe apenas name, description e value
    public function __construct($name, $description, $value) {
        // Incrementa o último ID e atribui ao novo produto
        self::$lastId++;
        $this->id = self::$lastId;

        $this->name = $name;
        $this->description = $description;
        $this->value = $value;
        $this->stock = 0; // Stock inicial começa a 0
    }

    // Método estático para sincronizar o $lastId com a sessão (exigido no ponto 5)
    public static function initClass() {
        if (isset($_SESSION['lastId'])) {
            self::$lastId = $_SESSION['lastId'];
        }
    }

    // Método que gera o elemento HTML (LI) do produto para a lista no index.php
    public function renderListItem() {
        // Corta a descrição para mostrar no máximo 15 carateres
        $shortDesc = substr($this->description, 0, 15);
        
        // Formata o valor no formato de moeda (ex: €50)
        $formattedValue = $this->value . '€';

        $html = <<<HTML
        <li>
            <strong>Produto {$this->id}</strong> - 
            {$this->name} | 
            {$shortDesc}... | 
            {$formattedValue} | 
            Stock: {$this->stock} 
            [<a href='./product.php?id={$this->id}'>Editar</a>] 
            [<a href='./buy.php?id={$this->id}'>Comprar (+1)</a>] 
            [<a href='./sell.php?id={$this->id}'>Vender (-1)</a>]
        </li>
        HTML;

        return $html;
    }
}