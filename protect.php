<?php 

	if(!isset($_SESSION)){

		session_start();
	}

	if(!isset($_SESSION['id'])){

		die("Você não pode acessar essa página, pois não está logado. Para realizar login <a href='index.php'>clique aqui</a>");
	}