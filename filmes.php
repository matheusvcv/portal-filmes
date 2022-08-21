<?php

require "protect.php";

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<title>Movies</title>
</head>
<body>
	<div id="sair">
		<button><a href="index.php">Sair</a></button>
	</div>
	<div id="faixa1">
	</div>
		<div id="faixa">
			<h1>Procurar Filmes</h1>
		</div>
	<div id="faixa1">
	</div>
	<div id="container">
		<form action="" method="POST">
			<p>
				<strong>Nome do filme:</strong> <input type="text" name="titulo">
				<input type="submit" value="Procurar">
			</p><br> 
		</form>

	<?php

	if($_SERVER['REQUEST_METHOD'] === 'POST'){

			
		$search = $_POST['titulo'];

		$url = "https://api.themoviedb.org/3/search/movie?query={$search}&api_key=1753ff13cf319b59dd371d17ea861b96&language=pt-BR";

		$json = file_get_contents($url);

		$obj = json_decode($json);

		$total_pages = $obj->total_pages;

			for($i = 1; $i <= $total_pages; $i++){

				$url_single = "https://api.themoviedb.org/3/search/movie?query={$search}&api_key=1753ff13cf319b59dd371d17ea861b96&language=pt-BR&page={$i}";

				$json_single = file_get_contents($url_single);

				$obj_single = json_decode($json_single);

					if(isset($obj_single)) { foreach($obj_single->results as $resultado): ?>

						<p>

						<form method="POST" action="listas.php">
							<div id="bloco">
							
								<strong><?php echo $resultado->title; ?></strong><br>

								<input type="hidden" name="titulo" value="<?php echo $resultado->title; ?>">

								<br><img src="https://image.tmdb.org/t/p/w220_and_h330_face/<?php echo $resultado->poster_path; ?>"><br>

								<input type="hidden" name="imagem" value="https://image.tmdb.org/t/p/w220_and_h330_face/<?php echo $resultado->poster_path; ?>">
							
								Pupularidade: <strong><?php echo $resultado->popularity; ?></strong><br>

								<input type="hidden" name="popularidade" value="<?php echo $resultado->popularity; ?>">

								ID: <strong><?php echo $resultado->id; ?></strong><br>

								<input type="hidden" name="id" value="<?php echo $resultado->id; ?>">

								<br><input type="submit" value="Adicionar em Alguma Lista">
							</div>
						</p><br>
						</form>

					<?php endforeach; } } } ?>
			</div>
		</div>
</body>
</html>
