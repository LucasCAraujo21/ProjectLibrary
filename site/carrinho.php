    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

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
            include 'conexao.php';
            session_start(); // iniciando sessão
            
            // verificando se usuário está logado
            if(empty($_SESSION['ID'])){
                
                header('location:login.php'); // enviando para formlogon.php
                
            }

            include 'conexao.php'; 
            include 'nav.php';
            include 'cabecalho.html';

            //verifica se o codigo do livro não esta vazio
            if(!empty($_GET['cd'])){
                //inserindo o id do livro na variavel $cd_prod
                $cd_prod=$_GET['cd'];
                

                //se a sessão carrinho não estiver preenchida
                if(!isset($_SESSION['carrinho'])){
                    //erá criado uma sessão chamado carrinho para receber um vetor
                    $_SESSION['carrinho'] = array();
                }

                //se a variavel $cd_prod não estiver setada
                if(!isset($_SESSION['carrinho'][$cd_prod])){
                    //sera adicionado um produto ao carrinho
                    $_SESSION['carrinho'][$cd_prod]=1;
                }            
                else{//caso contrario, se ela estiver setada, adicione novos produtos
                    $_SESSION['carrinho'][$cd_prod]+=1;
                }

                //incluindo o arquivo 'mostraCarrinho.php'
                include 'mostraCarrinho.php';
            }
            else{
                //mostrando o carrinho vazio
                include 'mostraCarrinho.php';
            }
        ?>
        <!-- exibindo o valor da variável total da compra -->
        <div class="total text-center">
            <div class="total-price"><b>Total:</b> R$<?php echo number_format($total,2,',','.');?></div>
        </div>

        <div class="text-center justify-content-between" id="botaoCarrinho">
            <a href="index.php">   
                <button type="button" class="btn btn-success col-md-3 finaliza">Continuar comprando</button>
            </a>

            <?php if(count($_SESSION['carrinho'])>0){ ?>
                <a href="finalizarCompra.php">   
                    <button type="button" class="btn btn-success col-md-3 finaliza">Finalizar compra</button>
                </a>
            <?php } ?>

        </div>	


        <?php include 'rodape.php' ?>

    </body>       
</html>