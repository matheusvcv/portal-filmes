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

		public function exibeFilmesDesejo(): array
		{
			$exibir = $this->conexao->query("SELECT * FROM lista_desejo");

			$filmes = $exibir-> fetch_all(MYSQLI_ASSOC);

			return $filmes;
		}


	}