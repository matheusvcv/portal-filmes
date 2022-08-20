<?php

	require "conexao.php";

	class Piores
	{
		private $conexao;

		public function __construct(mysqli $conexao)
		{
			$this->conexao = $conexao;
		}

		public function insereFilmesPiores(int $id_usuario, string $imagem, string $titulo, string $popularidade): void
		{
			$inserir = $this->conexao->prepare("INSERT INTO piores(id_usuario, imagem, titulo, popularidade) VALUES(?,?,?,?)");

			$inserir->bind_param('isss', $id_usuario, $imagem, $titulo, $popularidade);

			$inserir->execute();
		}

		public function exibeFilmesPiores(int $id_usuario): array
		{
			$exibePiores = $this->conexao->query("SELECT * FROM piores WHERE id_usuario = $id_usuario");

			$piores = $exibePiores->fetch_all(MYSQLI_ASSOC);

			return $piores;	
		}

		public function exibeFilmeIndPior(int $id): array
		{
			$exibe = $this->conexao->query("SELECT * FROM piores WHERE id = $id");

			$filme = $exibe-> fetch_all(MYSQLI_ASSOC);

			return $filme;	
		}

		public function deletaFilmesPior(int $id, int $id_usuario): void
		{
			$deletaFav = $this->conexao->prepare("DELETE FROM piores WHERE id = ? AND id_usuario = ?");

			$deletaFav-> bind_param('ii', $id, $id_usuario);

			$deletaFav->execute();
		}
	}