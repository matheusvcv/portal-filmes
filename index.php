<?php

require 'src/conexao.php';

if(isset($_POST['user']) || isset($_POST['senha'])){

	if(strlen($_POST['user']) === 0){

		echo "Por favor, preencha o campo destinado ao seu Username!";

	}else if(strlen($_POST['senha']) === 0){

		echo "Por favor, preencha o cmapo destinado à sua senha!";

	} else {

		$user = $conexao->real_escape_string($_POST['user']);
		$senha = $conexao->real_escape_string($_POST['senha']);

		$codigo_consulta = "SELECT * FROM usuarios WHERE user='$user' AND senha='$senha'";
		$sql_consulta = $conexao->query($codigo_consulta) or die("Falha na execução do código SQL.");

		$quantidade = $sql_consulta->num_rows;

		if($quantidade === 1) {

			$user = $sql_consulta-> fetch_assoc();

			if(!isset($_SESSION)){

				session_start();

			}

				$_SESSION['id'] = $user['id'];
				$_SESSION['nome'] = $user['nome'];

				header('Location: inicio.php');
			} else {

				echo "Falha na tentativa de Login. Username ou senha incorretos!";
		}
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" width="device-width initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style1.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
	<title>Login</title>
</head>
<body>
	<div id="faixa1"></div>
	<div id="faixa">
		<h1>Login MyCheckMovieList</h1>
	</div>
	<div id="faixa1"></div>
	<div id="container">
		<form method="POST" action="">
			<p>
				<strong>Digite seu Username:</strong><br>
				<br><input type="text" name="user" placeholder="Nome de Usuário">
			</p>
			<p>
				<strong>Digite sua Senha: </strong><br>
				<br><input type="password" name="senha" placeholder="Senha">
			</p>
			<p>
				<input type="submit" value="Entrar">
			</p>
		</form>	
	</div>
	<div id="faixa1"></div>
	<div id="logo">
		<img src="img/cosvib.png">
	</div>
</body>
</html>