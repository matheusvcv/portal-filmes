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

		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<title>Movies</title>
</head>
<body>
	<h1>Procurar Filmes</h1>
	<form action="" method="POST">
		<p>
			<strong>Nome do filme:</strong> <input type="text" name="titulo">
		</p>
		<p>
			<input type="submit" value="Procurar">
		</p>
	</form>

	<?php  

		if(isset($obj_single)) { 

			foreach($obj_single->results as $resultado){ 

			echo $resultado->title . "<br>";
			} 
		} 

	?>

</body>
</html>

