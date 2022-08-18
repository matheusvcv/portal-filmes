<?php

require($conexao);

	class Filme
	{
		private $conexao;

		public function __construct(mysqli $conexao)
		{
			$this->conexao = $conexao;
		}

		public function insereFilmesFav(string $imagem, string $titulo, string $popularidade)
		{
			$inserir = $this->conexao->prepare("INSERT INTO favoritos VALUES('?,?,?')");

			$inserir->bind_param('sss', $imagem, $titulo, $popularidade);

			$inserir->execute();
		}
	}