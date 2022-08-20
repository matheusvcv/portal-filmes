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
	<title>Lista de Desejo</title>
</head>
<body>
	<a href="index.php">Sair</a>
	<div id="container">
		<p><h1>Lista de Desejos</h1></p>
		<p>Lista de desejos de <?php echo $_SESSION['nome']; ?></p>
		<?php foreach($desejos as $desejo): ?>

		<p><img src="<?php echo $desejo['imagem']; ?>"></p>
		<p><strong>Título: </strong><?php echo $desejo['titulo'] ?></p>
		<p><strong>Popularidade: </strong><?php echo $desejo['popularidade']; ?></p>
		<p><a href="deletar_desejos.php?id=<?php echo $desejo['id']; ?>"><button>Remover</button></a></p>

		<?php endforeach; ?>

	<a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>