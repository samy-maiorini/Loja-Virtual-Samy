<?php include("../../funcoes.php"); ?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/css/style.css">
    <title>Produto</title>
    <style>
        img {
            width: 400px;
            height: 400px;
            object-fit: fill;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #ffffff;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            min-width: 1000px;
            z-index: 1;
            padding: 1px;
            box-sizing: border-box;
            flex-wrap: wrap;
        }
        .dropdown-content a {
            color: black;
            text-decoration: none;
            font-size: 11px;
            padding: 30px 30px;
            box-sizing: border-box;
            text-align: center;
            margin-bottom: 5px;
        }
        .dropdown-content a:hover {
            background-color: #ddd;
        }
        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 16px;
            font-size: 1.1rem;
            cursor: pointer;
            border-radius: 20px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1><a href='../../../index.php'><img src="../../../public/img/casa.png"> Lojinha do Samy</a></h1>
    </div>
    <div class="container-produto">
        <div class="pag-produto">
            <div class="produto-info">
                <div class="imagem-produto">
                    <?php 
                    include_once("../../database/dados.php");
                    $id = $_GET["id"];
                    $produto = $produtos[$id];
                    $nome = $produto["nome"];
                    $preco = $produto["preco"];
                    $imagem = $produto["imagem"];
                    $parc_cj = $produto["parcelamento_max_cj"];
                    $parc_sj = $produto["parcelamento_max_sj"];
                    $descricao = $produto["descricao"];
                    $juros_mes = $produto["juros"];

                    $j_cj = $preco * $juros_mes * $parc_cj;
                    $parcela_cj = ($preco + $j_cj) / $parc_cj;
                    $parcela_sj = $preco / $parc_sj;

                    draw_img("../../../public/img/$imagem", "imgdetalhes");
                    ?>
                </div>
                <div class="texto-produto">
                    <h1><?= ($nome) ?></h1> <!-- nome -->
                    <h2>R$ <?= formatarDinheiro($preco) ?></h2> <!-- preco -->
                    <h3>Em até <?= $parc_sj ?>x de R$ <?= formatarDinheiro($parcela_sj) ?> sem juros</h3> <!-- parc sj -->
                    <h3>ou <?= $parc_cj ?>x de R$ <?= formatarDinheiro($parcela_cj) ?> com juros</h3> <!-- parc cj -->
                    <button class="botao-detalhes">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front text">Comprar</span>
                    </button> <!-- fim botao comprar -->

                    <!-- botao parcelamento -->
                    <button class="dropbtn" onclick="toggleDropdown()">Parcelamento</button>
                    <div class="dropdown">
                        <div class="dropdown-content">
                            <?php 
                            function calcular_parcelas($preco, $parc_cj, $juros_mes, $parc_sj) {
                                $parcelas = [];
                                for ($i = 1; $i <= $parc_cj; $i++) {
                                    if ($i <= $parc_sj) {
                                        $parcelas[$i] = $preco / $i;
                                    } else {
                                        $preco_cparc = $preco + ($preco * $juros_mes * $i);
                                        $parcelas[$i] = $preco_cparc / $i;
                                    }
                                }
                                return $parcelas;
                            }

                            $parcelas = calcular_parcelas($preco, $parc_cj, $juros_mes, $parc_sj);

                            foreach ($parcelas as $num_parcelas => $parcela) {
                                if ($num_parcelas <= $parc_sj) {
                                    echo "<a>$num_parcelas x de R$ " . formatarDinheiro($parcela) . " s/ juros </a>";
                                } else {
                                    echo "<a>$num_parcelas x de R$ " . formatarDinheiro($parcela) . "</a>";
                                }
                            }
                            ?>
                        </div>
                    </div> <!-- fim botao parcelamento -->
                </div>
            </div>
            <div class="descricao-produto">
                <h1>Descrição:</h1>
                <?= ($descricao) ?>
            </div>
        </div> <!-- pag-produto -->
    </div> <!-- container-produto -->
    
    <script>
        function toggleDropdown() {
            var dropdownContent = document.querySelector('.dropdown-content');
            if (dropdownContent.style.display === 'none' || dropdownContent.style.display === '') {
                dropdownContent.style.display = 'flex';
            } else {
                dropdownContent.style.display = 'none';
            }
        }
    </script>
</body>
</html>
