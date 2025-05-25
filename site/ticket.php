<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            session_start(); // iniciando sessão
            
            // verificando se usuário está logado
            if(empty($_SESSION['ID'])){
                
                header('location:login-funcionario.php'); // enviando para formlogon.php
            }

            include 'conexao.php';
            include 'nav.php';
            include 'cabecalho.html';
            
            $total = null;//variavel total que recebe valor nulo

            $ticket= $_GET['ticket'];
            $consultaVenda = $cn->query("select * from vw_venda where no_ticket = '$ticket'");

        ?>

        <section class="container livutos">
            <h4><b>Compras realizadas</b></h4><hr>
                
            <article class="compras">
                <div class="text-center row d-flex justify-content-between" style="margin-top: 15px;">
                    
                    <div class="col-sm-2 col-md-offset-3"> <b>Data</b></div>
                    <div class="col-sm-2"> <b>Ticket</b> </div>
                    <div class="col-sm-2"> <b>livuto</b> </div>
                    <div class="col-sm-2"> <b>Quantidade</b> </div>
                    <div class="col-sm-2"> <b>Preço</b> </div>
                            
                </div>		

                <?php while($exibeVen = $consultaVenda->fetch(PDO::FETCH_ASSOC)){
                    $total += $exibeVen['valor_venda'];  
                ?>
                    <div class="text-center row d-flex justify-content-between" style="margin-top: 15px;">
                        
                        <div class="col-sm-2 col-md-offset-3"><p class="dado"><?php echo date('d/m/Y', strtotime($exibeVen['dt_venda']))?></p></div>
                        <div class="col-sm-2" href=""><p class="dado"><?php echo $exibeVen['no_ticket']?></p></div>
                        <div class="col-sm-2"><p class="dado"><?php echo $exibeVen['nome_liv']?></p></div>
                        <div class="col-sm-2"><p class="dado"><?php echo $exibeVen['qt_liv']?></p></div>
                        <div class="col-sm-2"><p class="dado">R$<?php echo number_format ($exibeVen['valor_venda'], 2, ',','.')?></p></div>    
                    </div>		
                <?php } ?>
                <hr>
                <div class="text-center row d-flex justify-content-center">
                <div class="total-price"><b>Total:</b><p class="dado">R$<?php echo number_format($total,2,',','.');?></p></div>
                </div>
                <br>
                <div class="text-center row d-flex justify-content-center">
                    <div class="col-sm-2"><a href="areaCliente.php"><p class="dadoTiket">Voltar</p></b></a></div> 
                </div>
            </article>
        </section>

        <!-- Arquivos do Bootstrap -->
        <script src="./assets/js/main.js"></script>
        <script src="./assets/js/jquery.js"></script>
        <script src="./assets/js/pooper.js"></script>
        <script src="./assets/js/bootstrap.js"></script>

        <?php include 'rodape.php' ?>
    </body>
</html>