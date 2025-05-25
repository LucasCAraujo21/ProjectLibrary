<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS -->

        <title>BooksOnline</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
        
                
    </head>

    <body>	

        <?php 
            session_start();

            if(empty($_SESSION['ID'])){ 
                header("location:login.php");
            }

            include 'conexao.php'; 
            include 'nav.php';
            include 'cabecalho.html';

            $cd_cliente = $_SESSION['ID'];
            $consultaVenda = $cn->query("select * from vw_venda where id_usu = $cd_cliente group by no_ticket");
            $consultaCli = $cn->query("select nome_usu, email_usu, senha_usu, CPF_usu from usuario where id_usu = '$cd_cliente'");
            $exibeCli = $consultaCli->fetch(PDO::FETCH_ASSOC);
        ?>

        <section class="container">
            <h2 class="text-center conta"><b>Minha conta</b></h2><br><br> 
            <h4><b>Dados</b></h4><hr>
            <article class="dados conta">
                <nav class="row d-flex justify-content-between">
                    <p class="col-md-2  d-flex conta"><b>Dados Pessoais</b></p>
                    <a class="col-md-2  d-flex conta" href="editar_usuario.php"><p><b>Alterar</b></p></a>
                </nav>
                <hr>
                <p class="dado"><b>Nome:</b> <?php echo $exibeCli['nome_usu'];?></p>
                <p class="dado"><b>Email:</b> <?php echo $exibeCli['email_usu'];?></p>                        
                <p class="dado"><b>Senha:</b> <?php echo $exibeCli['senha_usu'];?></p>                        
                <p class="dado"><b>CPF:</b> <?php echo $exibeCli['CPF_usu'];?></p>                        
            </article>
        </section>

        <div class="container-fluid">
            <section class="container produtos">
                <h4><b>Compras realizadas</b></h4><hr>
                <article class="compras">
                    <div class="text-center row d-flex justify-content-center" style="margin-top: 15px;">
                    
                        <div class="col-sm-2 col-md-offset-3"><b>Data</b></div>
                        <div class="col-sm-2"> <b>Ticket</b></div>
                            
                    </div>		

                    <?php while($exibeVen = $consultaVenda->fetch(PDO::FETCH_ASSOC)){?>
                        <div class="text-center row d-flex justify-content-center" style="margin-top: 15px;">
                            
                            <div class="col-sm-2 col-md-offset-3"><p class="dado"><?php echo date('d/m/Y', strtotime($exibeVen['dt_venda']))?></p></div>
                            <div class="col-sm-2"><a href="ticket.php?ticket=<?php echo $exibeVen['no_ticket']?>"><p class="dadoTiket"><?php echo $exibeVen['no_ticket']?></p> </div></a>
                        </div>		
                    <?php } ?>
                </article>
            </section>
        </div>

        <?php include 'rodape.php' ?>

    </body>
</html>