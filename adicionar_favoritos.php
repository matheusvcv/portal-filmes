<?php

require 'protect.php';
require "src/conexao.php";
require "src/favoritos.php";


if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $insereFav = New Favoritos($conexao);
    $insere = $insereFav->insereFilmesFav($_SESSION['id'], $_SESSION['imagem'], $_SESSION['titulo'], $_SESSION['popularidade']);

    header('Location: lista-fav.php');
}

?>
















