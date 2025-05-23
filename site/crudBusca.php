<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
        <link rel="stylesheet" href="style_crud.css">
    </head>

    <body>

        <?php 
            ini_set('display_errors', 0);
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            include 'conexao.php';
            session_start();
            if(empty($_SESSION['ID']))
            {
                header("location:index.php");
            }
            $pesquisa = $_GET['txtbusca'];
            $consulta = $cn->query("select * from livro where nome_liv like concat ('%','$pesquisa','%')");
            
        ?>

        <section class="area-login">
            <div class="container">
                <div class="header">
                    <h1 class="titulo2">Cadastro de livros</h1>
                    <div class="add-bt">
                        <a href="inserir.php"><button id="add">Adicionar</i></button></a> 
                        <a href="areaAdm.php"><button id="add">inicio</i></button></a>
                    </div>
                    <form>
                        <input type="text" name="txtbusca"  placeholder="digite o livro..." />
                        <input class="button-pesquisar" type="submit" name="busca" value="BUSCAR" />
                    </form>
                </div>

                <section class="container-fluid-livros">
                <?php while($exibe = $consulta->fetch(PDO::FETCH_ASSOC)) { ?>

                <div class="divTablebd">
                    <table class="table-livbd">
                        <thead class="liv-trbd">
                        <tr>
                            <!--motra os livros-->
                            <th><div><img src="assets/images/<?php echo $exibe['img_liv']; ?>" class="img-fluid"></div></th>
                            <th><div><h4><?php echo $exibe['nome_liv']; ?></h4></div></th>
                            <th><div><h4 >R$ <?php echo $exibe['valor']; ?></h4></div></th>

                            <!--botoes para alterar e excluir-->
                            <th><a href="alterar.php?id=<?php echo $exibe['id_liv'];?>&id2=<?php echo $exibe['id_categoria'];?>">
                                <button id="add" type="submit" >Alterar</button>
                            <th class="acao"> <a href="excluir.php?id=<?php echo $exibe['id_liv']; ?>">
                                <button id="add" type="submit" class="btn btn-success col-md-6">Excluir</button>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <?php  } ?>                
                </div> 
                            
            </div>		
                
        </section>
    </body>

</html>