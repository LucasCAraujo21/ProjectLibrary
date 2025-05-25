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

            if(!empty($_GET['cd'])){
                $id_liv = $_GET['cd'];    

                $consulta = $cn->query("select * from vw_livro where id_liv = '$id_liv'");
                $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
            }
            else{
                header("location:index.php");
            }
        ?>

        <section class="container">
            <div class="shop-content">
                <article class="row produtos-compra">
                    <figure class="col-md-7 mb-5">
                            <img src="assets/images/<?php echo $exibe['img_liv']; ?>" class="img-responsive" style="width:100%; padding-top: 20px;"
                            alt="erro">
                    </figure>
                    <section class="col-md-5 mb-5 d-flex flex-column justify-content-around">
                        <article class="produtos-conteudo">
                            <h1 class="product-title"><?php echo $exibe['nome_liv'];?></h1>
                            <p><?php echo $exibe['desc_liv'];?></p>
                            
                        </article>


                        <article class="produtos-preco mb-">
                            <div class="produtos-stars">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>

                            </div>
                            <strong">
                            <div class="price">R$<?php echo $exibe['valor'];?></div>
                                <span class="d-block">Em até 12x sem Juros</span>
                            </strong>
                        
                            <div class="form-group">
                                <label for="produtos-quantidade-itens">Quantidade no estoque</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <?php  if($exibe['quant_liv'] > 0) {
                                    for($x = 1; $x<=$exibe['quant_liv']; $x++) {?>;
                                        <option value=<?php echo $x;?>><?php echo $x;?></option>
                                    <?php } } else { ?>;
                                        <option><?php echo 0?></option>
                                    <?php } ?>
                                </select>
                            </div>
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

                        </article>

                    </section>
                </article>
            </div>
        </section>
        <?php include 'rodape.php' ?>
    </body>
</html>