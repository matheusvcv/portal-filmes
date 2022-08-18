<?php

	$conexao = New mysqli('localhost', 'root', '', 'tmdb');

	$conexao->set_charset('utf8');

	if($conexao === FALSE){

		echo "Falha na conexão!";
	}