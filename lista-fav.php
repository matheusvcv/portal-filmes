<?php

require "protect.php";
require "src/conexao.php";
require "src/favoritos.php";

$exibeFav = New Favoritos($conexao);
$favoritos = $exibeFav->exibeFilmesFav($_SESSION['id']);


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Favoritos</title>
</head>
<body>
	<div id="sair">
		<button><a href="index.php">Sair</a></button>
	</div>
		<div id="faixa1"></div>
		<div id="faixa">
			<h1>Lista de filmes favoritos</h1>
		</div>
		<div id="faixa1"></div>
		<div id="container">
		<p>
			Lista de filmes preferidos de <?php echo $_SESSION['nome']; ?>!
		</p>
			<?php foreach($favoritos as $favorito): ?>
		<br><div id="bloco">
		<p>
			<p><strong><?php echo $favorito['titulo']; ?></strong></p>
			<img src="<?php echo $favorito['imagem']; ?>">
			<p><strong>Nota: <?php echo $favorito['popularidade']; ?></strong></p>
			<p><a href="deletar.php?id=<?php echo $favorito['id']; ?>"><button>Remover</button></a><p>
		</p>
		</div><br>
			<?php endforeach; ?>
		<br><a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>