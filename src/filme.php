<?php

require "conexao.php";

	class Filme
	{
		private $conexao;

		public function __construct(mysqli $conexao)
		{
			$this->conexao = $conexao;
		}


		public function insereFilmesFav(string $imagem, string $titulo, string $popularidade): void
		{
			$inserir = $this->conexao->prepare("INSERT INTO favoritos(imagem, titulo, popularidade) VALUES(?,?,?)");

			$inserir->bind_param('sss', $imagem, $titulo, $popularidade);

			$inserir->execute();
		}

		public function exibeFilmesFav(): array
		{
			$exibeFav = $this->conexao->query("SELECT * FROM favoritos");

			
		}



	}