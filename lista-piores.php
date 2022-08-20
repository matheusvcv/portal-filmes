<?php

require "protect.php";
require "src/conexao.php";
require "src/piores.php";

$filmes = New Piores($conexao);
$piores = $filmes-> exibeFilmesPiores($_SESSION['id']);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Piores</title>
</head>
<body>
	<a href="index.php">Sair</a>
	<div id="container">
		<p>
			<h1>Lista dos Piores Filmes</h1>
		</p>
		<p>
			Lista dos piores filmes preferidos assistidos por <?php echo $_SESSION['nome']; ?>!
		</p>
			<?php foreach($piores as $pior): ?>
		<p>
			<img src="<?php echo $pior['imagem']; ?>">
			<p><?php echo $pior['titulo']; ?></p>
			<p><?php echo $pior['popularidade']; ?></p>
			<p><a href="deletar-piores.php?id=<?php echo $pior['id']; ?>"><button>Remover</button></a><p>
		</p>
			<?php endforeach; ?>
		<br><a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>