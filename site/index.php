<!doctype html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>BooksOnline</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>BooksOnline</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
        
        <style type = "text/css">
            .navbar
            {
                margin-bottom: 0;
            }
        </style>
    </head>

    <body>
        <?php 
            session_start();
            include 'conexao.php'; 
            include 'nav.php';
            include 'cabecalho.html';

            //variavel "consulta" que recebe variavel "cn"(conexao), no qual recebe o resultado de uma consulta no banco
            $consulta = $cn-> query('select id_liv, nome_liv, valor, img_liv, quant_liv from livro');
        ?>

        <main>
            <!-- Container Produtos -->
            <section class="container produtos">
                <!-- variavel "exibe" recebe o resultado da consulta em forma de matriz -->
                <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="col-sm-3">
                        <img src="assets/images/<?php echo $exibe['img_liv']; ?>" class="img-responsive" style="width:100%">
                        <div><h1><?php echo mb_strimwidth($exibe['nome_liv'],0, 37, '...'); ?></h1></div>
                        <br>
                        <div><h2>R$ <?php echo number_format($exibe['valor'],2,',','.'); ?></h></div>

                        <div class="text-center">
                            <a href="detalhes.php?cd=<?php echo $exibe['id_liv'];?>">
                                <button class="btn btn-lg btn-block btn-warning" style="color:white">
                                    <span class="glyphicon glyphicon-info-sign"> Detalhes</span>
                                </button>
                            </a>
                        </div>

                        <div class="text-center" style="margin-top: 5px; margin-bottom: 5px">
                            <?php if($exibe['quant_liv']> 0){ ?>
                                <a href="carrinho.php?cd=<?php echo $exibe['id_liv'];?>">
                                    <button class="btn btn-lg btn-block btn-warning">
                                        <span class="glyphicon glyphicon-shopping-cart" style="color:white"> Adicionar</span>
                                    </button>
                                </a>
                            <?php }

                            else { ?>
                            <button class="btn btn-lg btn-block btn-danger" style="color:white" disabled>
                                <span class="glyphicon glyphicon-shopping-cart"> Indisponível</span>
                            </button>
                            <?php } ?>

                        </div>                                                
                    </div>
                <?php } ?>
            </section >
            <!-- Fim Container Produtos -->
        </main>
        <?php include 'rodape.php' ?>

    </body>
</html>