<!doctype html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Minha Loja</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <title>Livraria</title>
        <link rel="stylesheet" href="style.css">

        <style type = "text/css">
            .navbar
            {
                margin-bottom: 0;
            }
        </style>
    </head>
    <body>
    <?php ?>

    <?php include 'nav.php' ?>
    <?php include 'cabecalho.html' ?>
<main>

    <!-- Slides Banners de Promoção -->
    <section id="banners-promocionais" class="carousel slide" data-bs-ride="true" data-ride="carousel">

        <!-- Imagens -->
        <article class="carousel-inner">
            <figure class="carousel-item active">
                <img src="./assets/images/1.png" class="d-block w-100" alt="Banner Promocional">
            </figure>
            <figure class="carousel-item">
                <img src="./assets/images/2.png" class="d-block w-100" alt="Banner Promocional 2">
            </figure>
            <figure class="carousel-item">
                <img src="./assets/images/3.png" class="d-block w-100"
                    alt="Banner Promocional 3.png">
            </figure>
        </article>

        <!-- Botão Anterior -->
        <a class="carousel-control-prev" type="button" href="#banners-promocionais" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>

        <!-- Botão Proximo -->
        <a class="carousel-control-next" type="button" href="#banners-promocionais" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </a>
    </section>
    <!-- Fim Slides Banners de Promoção -->

    <!-- Banners de Promoção com 6 colunas -->
    <section class="container banners-promocionais-statico">
        <!-- Row -->
        <section class="row ">
            <!-- Banner -->
            <article class="col-md-6">

                <div class="banners-promocionais-statico-12x d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-credit-card" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v1h14V4a1 1 0 0 0-1-1H2zm13 4H1v5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V7z" />
                        <path d="M2 10a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-1z" />
                    </svg>
                    <p>Parcele em até<br>
                        <strong> 12x sem juros</strong>
                    </p>
                </div>

            </article>

            <!-- Banner -->
            <article class="col-md-6">
                <div class="banners-promocionais-statico-todo-br d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                        class="bi bi-cart-fill" viewBox="0 0 16 16">
                        <path
                            d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                    </svg>
                    <p>
                        Entrega para <br>
                        <strong>todo Brasil</strong>
                    </p>

                </div>
            </article>

        </section>
        <!-- Fim Row -->
    </section>
    <!-- Fim Banners de Promoção com 6 colunas -->

    <!-- Container Produtos -->
    <section class="container produtos">
       

    </section >
    <!-- Fim Container Produtos -->

</main>


<?php include 'rodape.php' ?>

</body>
</html>