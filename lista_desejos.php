<?php

require "protect.php";
require "src/conexao.php";
require "src/desejo.php";

$filmes = New Desejo($conexao);
$desejos = $filmes->exibeFilmesDesejo($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<title>Lista de Desejo</title>
</head>
<body>
	<div id="sair">
		<button><a href="index.php">Sair</a></button>
	</div>
	<div id="faixa1"></div>
	<div id="faixa">
		<h1>Lista de Desejos</h1>
	</div>
	<div id="faixa1"></div>
	<div id="container">
		<p>Lista de desejos de <?php echo $_SESSION['nome']; ?></p>
			<?php foreach($desejos as $desejo): ?>

		<br><div id="bloco">

			<p><strong>Título: <?php echo $desejo['titulo'] ?></strong></p>
			<p><img src="<?php echo $desejo['imagem']; ?>"></p>
			<p><strong>Nota: <?php echo $desejo['popularidade']; ?></strong></p>
			<p><a href="deletar_desejos.php?id=<?php echo $desejo['id']; ?>"><button>Remover</button></a></p>

		</div><br>

			<?php endforeach; ?>

	<a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>