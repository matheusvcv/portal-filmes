<?php

require "protect.php";
require "src/conexao.php";
require "src/filme.php";

$filme = New Filme($conexao);
$mostrar = $filme-> exibeFilmeIndPior($_SESSION['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$inserir = $filme->insereFilmesPiores($_SESSION['id'], $_SESSION['imagem'], $_SESSION['titulo'], $_SESSION['popularidade']);

	header('Location: lista-piores.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Piores Filmes</title>
</head>
<body>
	<a href="index.php">Sair</a>
	<div id="container">
		<p>
			<h1>Lista dos Piores Filmes</h1>
		</p>
		<p>
			Lista dos piores filmes assistidos por <?php echo $_SESSION['nome']; ?>!
		</p>
		<p>
			Você tem certeza que deseja adicionar esse filme há sua lista de piores filmes?
		</p>
			<?php foreach($mostrar as $filme): ?>
		<p>
			<img src="<?php echo $filme['imagem']; ?>">
		</p>
		<p>
			<strong>Titulo: </strong><?php echo $filme['titulo']; ?>
		</p>
		<p>
			<strong>Ppopularidade: </strong><?php echo $filme['popularidade']; ?>
		</p>

		<form method="POST" action="">

			<input type="submit" value="Adicionar">

		</form>

			<?php endforeach; ?>
</body>
</html>