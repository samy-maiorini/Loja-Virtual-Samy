<?php include("../funcoes.php"); ?>
<?php
    include_once("../../database/dados.php");
    $id = $_GET["id"] ?? -1;
    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojinha do Samy</title>
    
</head>
<body>
    <h1>Lojinha do Samy</h1>
    <div class="container"> <!-- -->
        <?php 
        include_once("../../database/dados.php");

        foreach($produtos as $produto){
            $nome = $produto["nome"];
            $preco = $produto["preco"];
            $imagem = $produto["imagem"];
            $parcelamento = $produto["parcelamento"];
            include("../card.php");
        }
        ?>
    </div>
</body> 
</html>