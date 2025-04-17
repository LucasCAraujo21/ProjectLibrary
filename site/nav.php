<!-- Inicio Header -->
<header class="container-fluid">
    <!-- Container -->
    <section class="container">
        <!-- Row - colunas -->
        <article class="row d-flex align-items-center">
            <!-- "Logo" -->
            <a href="index.php" class="col-md-3  d-flex justify-content-center">
                <img src="assets/images/logonobg.png" class="img-fluid logo" alt="Logo Livraria">
            </a>
            <!-- Buscar -->
            <form action="index.php" class="col-md-6 d-flex align-items-center">
                <input type="text" name="txtbuscar" placeholder="Pesquisar Instrumentos aqui">

                <button class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>

            <!-- login funcionario -->
            <ul class="col-md-3 nav d-flex align-items-center justify-content-around">
                <li class="nav-item">
                    <a href="#">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        Entrar
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" id="cart-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" class="bi bi-cart-fill " >
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                
                        </svg>  
                        Carrinho
                    </a>
                    <!-- Carrinho -->
                    <div class="cart" style="z-index:1000">
                        <h2 class="cart-title">Seu Carrinho</h2>
                        <div class="cart-content">
                            <div class="cart-box">
                                <img src="./assets/images/" class="img-fluid cart-img" alt="Guitarras">
                                <div class="detail-box">
                                    <div class="cart-product-title"><?php echo $exibe['nome_prod'];?></div>
                                    <div class="cart-price">R$<?php echo $exibe['valor'];?></div>
                                    <div class="cart-price-title">Quantidade: <?php echo $exibe['quant_prod'];?></div>
                                </div>
                                    
                                <!--Remover-->
                                <a href="Cart0.php?id=<?php echo $exibe['id_prod']; ?>">
                                <i class="bx bxs-trash-alt cart-remove"></i>
                                </a>
                            </div>   
                        </div>

                            <!--Fechar Carrinho-->
                            <i class='bx bx-x' id="close-cart"></i>
                            
                            <div class="total">
                                <div class="total-title">Total</div>
                                <div class="total-price">R$<?php echo $exibeTotal['valor'];?></div>
                            </div>
                        <a href="carrinho.php">   
                            <button type="button" class="btn btn-success col-md-12 finaliza">Finalizar compra</button>
                        </a>
                    </div>
                </li>
            </ul>
        </article>
        <!-- Fim Row -->
    </section>
    <!-- Fim Container -->
</header>
<!-- Fim do Header -->

<!-- Inicio Menu do Site -->
<nav class="container-fluid nav-produtos ">
    <!-- Container -->
    <section class="container">
        <!-- Menu -->
        <ul class="nav">
            <!-- Lista de itens -->
            <li class="col-xl-2 col-md-12 nav-item d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor"
                    class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
                Livros
                <!-- SubMenu -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#guitarra">
                            Sci-fi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#violões">
                            Terror
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#bateria">
                            RPG
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#piano">
                            Estudos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#violinos">
                            Hqs
                        </a>
                    </li>

                </ul>
                <!-- Fim SubMenu -->
            </li>
            <!-- Lista de intens -->
        </ul>
    </section>
</nav>
<!-- Fim Menu do Site -->

