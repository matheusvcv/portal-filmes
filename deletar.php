<?php

require "protect.php";
require "src/conexao.php";
require "src/favoritos.php";

$filme = New Favoritos($conexao);
$mostrar = $filme->exibeFilmeFavInd($_GET['id']);

if($_SERVER['REQUEST_METHOD'] === 'POST'){

	$deletar = $filme->deletaFilmesFav($_GET['id'], $_SESSION['id']);

	header('Location: lista-fav.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Deletar</title>
</head>
<body>
	<div id="container">
	<h1>Deletar filme da lista de favoritos:</h1>

	<p>Você tem certeza que deseja remover esse filme da sua lista de favoritos?</p>

		<?php foreach($mostrar as $filme): ?>

			<p><img src="<?php echo $filme['imagem']; ?>"></p>

			<p><strong>Título:</strong> <?php echo $filme['titulo']; ?></p>

			<p><strong>Popularidade:</strong> <?php echo $filme['popularidade']; ?></p>

		<?php endforeach; ?>

		<form method="POST" action="">
			<input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">
			<input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id']; ?>">
			<input type="submit" value="Deletar">	
		</form>

	</div>
</body>
</html>