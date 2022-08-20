<?php

require "protect.php";
require "src/conexao.php";
require "src/desejo.php";

$filmes = New Desejo($conexao);
$desejos = $filmes-> exibeFilmesDesejoInd($_GET['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$deletar = $filmes-> deletaFilmeDesejo($_GET['id'], $_SESSION['id']);

	header('Location: lista_desejos.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Deletar Lista Desejos</title>
</head>
<body>
	<div id="container">
		<h1>Deletar filme da lista de desejos:</h1>

		<p>Você tem certeza que deseja remover esse filme da sua lista de desejos?</p>

		<?php foreach($desejos as $desejo): ?>

			<p><img src="<?php echo $desejo['imagem']; ?>"></p>

			<p><strong>Título:</strong> <?php echo $desejo['titulo']; ?></p>

			<p><strong>Popularidade:</strong> <?php echo $desejo['popularidade']; ?></p>

		<?php endforeach; ?>

		<form method="POST" action="">
			<input type="submit" value="Deletar">
		</form>

	</div>