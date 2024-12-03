<div class="card">
    <div class="card2">
    <?php
        echo "<a href='app/views/pages/descricao.php?id=$id'>";
    ?>

    <img class="cardimg" src="public/img/<?php echo($imagem);?>" alt="<?php echo($imagem);?>">

    <div>
        <?php
        $preco = $produto["preco"];
        $juros_mes = $produto["juros"];
        $parc_cj = $produto["parcelamento_max_cj"];
        $parc_sj = $produto["parcelamento_max_sj"];
        $j_cj = $preco * $juros_mes * $parc_cj;
                    $parcela_cj = ($preco + $j_cj) / $parc_cj;
                    $parcela_sj = $preco / $parc_sj;

                    if($juros_mes <=0){
                        echo "<p> $nome </p>
                        <div class='preco-card'>
                        <p> R$ " . formatarDinheiro($preco) . " </p>
                        </div>
                        <div class='parcelas-card'>
                        <p> $parc_sj  x de R$ ". formatarDinheiro($preco/$parc_sj) ." s/juros </p>
                        </div>
                        ";  
                    }else{
                        echo "<p> $nome </p>
                        <div class='preco-card'>
                        <p> R$ " . formatarDinheiro($preco) . " </p>
                        </div>
                        <div class='parcelas-card'>
                        <p> $parc_sj  x de R$ ". formatarDinheiro($preco/$parc_sj) ." s/juros </p>
                        <p>ou $parc_cj x de R$ ". formatarDinheiro($parcela_cj) ." com juros</p> <!--parc cj-->
                        </div>
                        ";
                    }
            
        ?>
    </div>
    <div class="botoes-baixo">
    <button class="botao-principal"  type = "button">Detalhes</button>
            <a href="../pages/descricao.php?id=<?=$posicao?>"></a>
    </div>
    
<!--card 1--> </div>
<!--card 2--> </div>