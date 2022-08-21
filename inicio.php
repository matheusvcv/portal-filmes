<?php

	require 'protect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Movies</title>
</head>
<body>
	<div id="sair">
		<button><a href="index.php">Sair</a></button>
	</div>
	<div id="faixa1">
	</div>
	<div id="faixa">
		<h1>Bem vindo ao MyCheckMovieList</h1>
	</div>
	<div id="faixa1"></div>
	<div id="container">
		<p>
			Seja bem-vindo <strong><?php echo $_SESSION['nome']; ?></strong>! O que você gostaria de fazer hoje?
		</p>
		<p>
			Procurar algum filme novo, para adicionar em alguma lista?<br>

			<div id="item">
				<a href="filmes.php">Procurar Filmes</a>
			</div>
		</p>
		<p>
			Verificar a sua lista de favoritos?<br>

			<div id="item">
				<a href="lista-fav.php">Meus Favoritos</a>
			</div>
		</p>
		<p>
			Verificar a sua lista de desejos?<br>

			<div id="item">
				<a href="lista_desejos.php">Lista de Desejos</a>
			</div>
		</p>
		<p>
			Verificar a sua lista de piores filmes?<br>

			<div id="item">
				<a href="lista-piores.php">Piores Filmes</a>
			</div>
		</p>
	</div>
	<div id="faixa1"></div>
</body>
</html>