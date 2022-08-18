<?php
 
require "src/conexao.php";
require "src/filme.php";

 $imagem = $_POST['imagem'];
 $titulo = $_POST['titulo'];
 $popularidade = $_POST['popularidade'];


 echo "<img src=$imagem>" . '<br>';
 echo $titulo . '<br>';
 echo $popularidade . '<br>';



    $insereFav = New Filme($conexao);
    $insere = $insereFav->insereFilmesFav($imagem, $titulo, $popularidade);

    header('Location: favoritos.php');


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" width="device-width initial-scale=1.0">
    <title>Add favorito</title>
</head>
<body>

    <p>
        Você tem certeza que deseja adicionar <?php echo $titulo; ?> na sua lista de favoritos?
    </p>
    <form method="POST" action="">
        <input type="submit" value="Adicionar">       
    </form>
    <a href='filmes.php'>Voltar</a>
</body>
</html>
















