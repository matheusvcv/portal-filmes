<?php

require "protect.php";
require "src/conexao.php";
require "src/piores.php";

$filme = New Piores($conexao);
$mostrar = $filme-> exibeFilmeIndPior($_SESSION['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$inserir = $filme->insereFilmesPiores($_SESSION['id'], $_SESSION['imagem'], $_SESSION['titulo'], $_SESSION['popularidade']);

	header('Location: lista-piores.php');
}

?>
