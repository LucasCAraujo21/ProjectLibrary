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
            <form class="col-md-6 d-flex align-items-center" name="frmpesquisa" method="get" action="buscar.php">
                <input type="text" name="txtbuscar" placeholder="Pesquisar Livros aqui">
                <button class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
                        <path
                            d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg>
                </button>
            </form>


            
            <!-- login -->
            <ul class="col-md-3 nav d-flex align-items-center justify-content-around">
                <?php if(empty($_SESSION['ID'])) { ?>
                <li class="nav-item">
                    <a href="login.php">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        Entrar
                    </a>
                </li>
                <?php } else { 
                    //valida se é usuario normal
                    if($_SESSION['Status'] == 0){
                        $consulta_usu = $cn->query("select nome_usu from usuario where id_usu = '$_SESSION[ID]'");
                        $exibe_usu = $consulta_usu->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <li class="nav-item">
                            <a href="#">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                <?php echo $exibe_usu['nome_usu'];?>
                            </a>
                        </li>
                        <li>
                            <a href="sair.php"><span class="glyphicon glyphicon-log-out">Sair</span></a>
                        </li>
                    <!-- valida se é adm -->
                    <?php } else {?>
                        <li class="nav-item">
                            <a href="adm.php">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-fill"
                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                <button class="btn btn-sm btn-danger">Admnistrador</button>
                            </a>
                        </li>
                        <li>
                            <a href="sair.php"><span class="glyphicon glyphicon-log-out">Sair</span></a>
                        </li>
                    <?php } ?>
                <?php } ?>
                

                <li class="nav-item">
                    <a href="#" id="cart-icon">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" class="bi bi-cart-fill " >
                            <path
                                d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                
                        </svg>  
                        Carrinho
                    </a>
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
                        <a href="categoria.php?cat=Sci-fi">
                            Sci-fi
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="categoria.php?cat=Terror">
                            Terror
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="categoria.php?cat=RPG">
                            RPG
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="categoria.php?cat=Estudos">
                            Estudos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="categoria.php?cat=Hqs">
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

