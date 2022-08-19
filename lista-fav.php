<?php

require "protect.php";
require "src/conexao.php";
require "src/filme.php";

$exibeFav = New Filme($conexao);
$favoritos = $exibeFav->exibeFilmesFav($_SESSION['id']);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Favoritos</title>
</head>
<body>
	<a href="index.php">Sair</a>
	<div id="container">
		<p>
			<h1>Lista de filmes favoritos</h1>
		</p>
		<p>
			Lista de filmes preferidos de <?php echo $_SESSION['nome']; ?>!
		</p>
			<?php foreach($favoritos as $favorito): ?>
		<p>
			<img src="<?php echo $favorito['imagem']; ?>">
			<p><?php echo $favorito['titulo']; ?></p>
			<p><?php echo $favorito['popularidade']; ?></p>
			<p><a href="deletar.php?id=<?php echo $favorito['id']; ?>"><button>Remover</button></a><p>
		</p>
			<?php endforeach; ?>
		<br><a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>