<?php 

require "conexao.php";

	class Desejo
	{
		private $conexao;

		public function __construct(mysqli $conexao)
		{
			$this-> conexao = $conexao;
		}

		public function insereFilmeDesejo(int $id_usuario, string $imagem, string $titulo, string $popularidade): void
		{
			$inserir = $this->conexao->prepare("INSERT INTO lista_desejo(id_usuario, imagem, titulo, popularidade) VALUES(?,?,?,?)");

			$inserir-> bind_param('isss', $id_usuario, $imagem, $titulo, $popularidade);

			$inserir-> execute();

		}

		public function exibeFilmesDesejo(int $id_usuario): array
		{
			$exibir = $this->conexao->query("SELECT * FROM lista_desejo WHERE id_usuario = $id_usuario");

			$filmes = $exibir-> fetch_all(MYSQLI_ASSOC);

			return $filmes;
		}

		public function exibeFilmesDesejoInd(int $id): array
		{
			$exibir = $this->conexao->query("SELECT * FROM lista_desejo WHERE id = $id");

			$filme = $exibir-> fetch_all(MYSQLI_ASSOC);

			return $filme;
		}


		public function deletaFilmeDesejo(int $id, int $id_usuario): void
		{
			$deletar = $this->conexao->prepare("DELETE FROM lista_desejo WHERE id=? AND id_usuario=?");

			$deletar-> bind_param('ii', $id, $id_usuario);

			$deletar-> execute();
		}


	}