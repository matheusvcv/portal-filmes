<?php

require "conexao.php";

	class Favoritos
	{
		private $conexao;

		public function __construct(mysqli $conexao)
		{
			$this->conexao = $conexao;
		}


		public function insereFilmesFav(int $id_usuario, string $imagem, string $titulo, string $popularidade): void
		{
			$inserir = $this->conexao->prepare("INSERT INTO favoritos(id_usuario, imagem, titulo, popularidade) VALUES(?,?,?,?)");

			$inserir->bind_param('isss', $id_usuario, $imagem, $titulo, $popularidade);

			$inserir->execute();
		}

		public function exibeFilmesFav(int $id_usuario): array
		{
			$exibeFav = $this->conexao->query("SELECT * FROM favoritos WHERE id_usuario = $id_usuario");

			$favoritos = $exibeFav->fetch_all(MYSQLI_ASSOC);

			return $favoritos;	
		}

		public function exibeFilmeFavInd(int $id): array
		{
			$exibe = $this->conexao->query("SELECT * FROM favoritos WHERE id = $id");

			$filme = $exibe-> fetch_all(MYSQLI_ASSOC);

			return $filme;	
		}

		public function deletaFilmesFav(int $id, int $id_usuario): void
		{
			$deletaFav = $this->conexao->prepare("DELETE FROM favoritos WHERE id = ? AND id_usuario = ?");

			$deletaFav-> bind_param('ii', $id, $id_usuario);

			$deletaFav->execute();
		}

	}