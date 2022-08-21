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
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Piores</title>
</head>
<body>
	<div id="sair">
		<button><a href="index.php">Sair</a></button>
	</div>
	<div id="faixa1"></div>
	<div id="faixa">
			<h1>Lista dos Piores Filmes</h1>
	</div>
	<div id="faixa1"></div>
	<div id="container">

		<p>
			Lista dos piores filmes assistidos por <?php echo $_SESSION['nome']; ?>!
		</p>

			<?php foreach($piores as $pior): ?>

		<br><div id="bloco">
		<br><p>	
			<strong><p><?php echo $pior['titulo'];?></p></strong>	
			<img src="<?php echo $pior['imagem'];?>">
			<strong><p>Nota: <?php echo $pior['popularidade'];?></p></strong>
			<a href="deletar-piores.php?id=<?php echo $pior['id'];?>"><button>Remover</button></a>
			
		</p><br>
		</div><br>	
			<?php endforeach; ?>
		
		<br><a href="inicio.php"><button>Voltar</button></a>
	</div>
</body>
</html>