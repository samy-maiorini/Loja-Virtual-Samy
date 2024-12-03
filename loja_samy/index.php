<?php 
include("app/funcoes.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojinha do Samy</title>
    <link rel="stylesheet" href="public/css/style.css">

</head>
<body>
    <!-- <h1><a href=''>Loja do Bahia</a></h1> -->
    <?php
    $href = ""; 
    include_once("app/views/components/header.php"); 
    ?>
    <div class="container"> 
        <?php 
        include_once("app/database/dados.php");

        foreach($produtos as $id=>$produto){
            $nome = $produto["nome"];
            $preco = $produto["preco"];
            $imagem = $produto["imagem"];
            $parcelamento = $produto["parcelamento_max_cj"];
            include("app/views/components/card.php");
        }
        ?>
    </div>
</body> 
</html>