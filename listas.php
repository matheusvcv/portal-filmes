<?php

require 'protect.php';
require "src/conexao.php";
require "src/filme.php";


 $_SESSION['imagem'] = $_POST['imagem'];
 $_SESSION['titulo'] = $_POST['titulo'];
 $_SESSION['popularidade'] = $_POST['popularidade'];



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" width="device-width initial-scale=1.0">
    <title>Adicionar Filme</title>
</head>
<body>

    <img src="<?php echo $_SESSION['imagem']?>">
    <p><strong>Título: </strong><?php echo $_SESSION['titulo']; ?></p>
    <p><strong>Popularidade: </strong><?php echo $_SESSION['popularidade']; ?></p>

    <p>
        <form method="POST" action="adicionar.php">

            <strong>Lista de favoritos</strong>

            <input type="hidden" name="imagem" value="<?php echo $_SESSION['imagem']; ?>">
            <input type="hidden" name="titulo" value="<?php echo $_SESSION['titulo']; ?>">
            <input type="hidden" name="popularidade" value="<?php echo $_SESSION['popularidade']; ?>">

            <input type="submit" value="Adicionar Favoritos">

        </form>
    </p>

    <p>
        <form method="POST" action="piores.php">

            <strong>Lista dos Piores filmes:</strong>

            <input type="hidden" name="imagem" value="<?php echo $_SESSION['imagem']; ?>">
            <input type="hidden" name="titulo" value="<?php echo $_SESSION['titulo']; ?>">
            <input type="hidden" name="popularidade" value="<?php echo $_SESSION['popularidade']; ?>">

            <input type="submit" value="Adicionar Piores Filmes">
        </form>  
    </p>

    <form method="POST" action="">
    </form>  

</body>
</html>
