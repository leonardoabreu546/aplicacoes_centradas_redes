<?php
// const é usado para valores que nunca mudam
const PAGES = ['home', 'vars', 'strings', 'arrays', 'about'];

// $ é usado para variáveis que têm valores que podem ser alterados
$current_page = $_GET['p'] ?? 0;

function renderMenu() {
    echo "<ul>";
    foreach (PAGES as $index => $page) {
        echo "<li><a href='?p=$index'>$page</a></li>";
    }
    echo "</ul>";
}

function getPageName() {
    global $current_page;
    return PAGES[$current_page] ?? PAGES[0];
}