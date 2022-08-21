<?php

require 'protect.php';
require "src/conexao.php";
require "src/favoritos.php";
require "src/piores.php";
require "src/desejo.php";


 $_SESSION['imagem'] = $_POST['imagem'];
 $_SESSION['titulo'] = $_POST['titulo'];
 $_SESSION['popularidade'] = $_POST['popularidade'];



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" width="device-width initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/cosvi.png">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Adicionar Filme</title>
</head>
<body>
    <div id="faixa1"></div>
    <div id="faixa">
        <h1>Em qual lista você gostaria de adicionar esse filme:</h1>
    </div>
    <div id="faixa1"></div>
    <div id="container" align="center">

        <p><strong><?php echo $_SESSION['titulo']; ?></strong></p>
        <p>Popularidade: <strong><?php echo $_SESSION['popularidade']; ?></strong></p>
        <img src="<?php echo $_SESSION['imagem']?>">

        <p>
            <form method="POST" action="adicionar_favoritos.php">

                <strong>Lista de favoritos: </strong><br>

                <input type="hidden" name="imagem" value="<?php echo $_SESSION['imagem']; ?>">
                <input type="hidden" name="titulo" value="<?php echo $_SESSION['titulo']; ?>">
                <input type="hidden" name="popularidade" value="<?php echo $_SESSION['popularidade']; ?>">

                <input type="submit" value="Adicionar Favoritos">

            </form>
        </p>

        <p>
            <form method="POST" action="adicionar_piores.php">

                <strong>Lista dos Piores filmes: </strong><br>

                <input type="hidden" name="imagem" value="<?php echo $_SESSION['imagem']; ?>">
                <input type="hidden" name="titulo" value="<?php echo $_SESSION['titulo']; ?>">
                <input type="hidden" name="popularidade" value="<?php echo $_SESSION['popularidade']; ?>">

                <input type="submit" value="Adicionar Piores Filmes">

            </form>  
        </p>

        <p>
        <form method="POST" action="adicionar_lista_desejo.php">
            
            <strong>Lista de Desejo: </strong><br>

            <input type="hidden" name="imagem" value="<?php echo $_SESSION['imagem']; ?>">
            <input type="hidden" name="titulo" value="<?php echo $_SESSION['titulo']; ?>">
            <input type="hidden" name="popularidade" value="<?php echo $_SESSION['popularidade']; ?>">

            <input type="submit" value="Adicionar Lista de Desejos">

        </form> 
        </p> 
    </div>
    <div id="faixa1"></div>

</body>
</html>
