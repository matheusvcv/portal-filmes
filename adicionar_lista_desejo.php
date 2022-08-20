<?php

require"protect.php";
require"src/conexao.php";
require"src/desejo.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$filme = New Desejo($conexao);
	$inserir = $filme->insereFilmeDesejo($_SESSION['id'], $_SESSION['imagem'], $_SESSION['titulo'], $_SESSION['popularidade']);

	header('Location:lista_desejos.php');

}