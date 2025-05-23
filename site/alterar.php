<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="alterar_liv.css" />
        <script src="./assets/js/jquery.js"></script>
        <script src="jquery.mask.js"></script>
        <title>Editar livro</title>

        <script>
            $(document).ready(function () {
                $('#preco').mask('000.000.000.000.000,00', { reverse: true });
            });
        </script>
    </head>
    <body>

        <?php
            session_start();

            //se a sessão id estiver vazia ou se a sessão status for diferente de adm, execute
            if (empty($_SESSION['ID'])) {
                header("location:index.php");
            }

            //recuperando os ids que foram enviados pela pagina crud.php
            $idLiv = $_GET['id'];
            $idCat = $_GET['id2'];

            include 'conexao.php';

            $consulta = $cn->query("SELECT * FROM livro WHERE id_liv='$idLiv'");	
	        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

            $consultaCat = $cn->query("SELECT * FROM categoria WHERE id_categoria='$idCat' union SELECT * FROM categoria WHERE id_categoria !='$idCat'");	
        ?>

        <section class="area-login">
            <div class="login">
                <div>
                    <p class="titulo">Editar livro</p>
                </div>
                

                <form method="post" action="alterar.php?id=<?php echo $exibe['id_liv']; ?>" enctype="multipart/form-data">
                    <input type="text" name="txtliv" value="<?php echo $exibe['nome_liv']; ?>" placeholder="Nome do livro..." required id="txtliv" />

                    <select class="form-control" name="sltcat">
                        <?php  
                            while($exibeCat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo $exibeCat['id_categoria']; ?>"><?php echo $exibeCat['ds_categoria']; ?></option>
                        <?php }?>
                    </select>

                    <input type="text" name="txtpreco" placeholder="Preço" value="<?php echo $exibe['valor']; ?>" required id="preco" />
                    <input type="number" name="txtqtd" placeholder="Quantidade..." value="<?php echo $exibe['quant_liv']; ?>" required id="txtqtd" />

                    <br />
                    <h2>descrição</h2>
                    <textarea class="area" rows="5" name="txtdesc"><?php echo $exibe['desc_liv']; ?></textarea>

                    <input type="file" accept="image/*" class="form-control" name="txtfoto1" id="foto1">
                    <img src="assets/images/<?php echo $exibe['img_liv']; ?>.png" class="img-responsive" style="width:100px">

                    <input class="button" type="submit" name="submit" value="ALTERAR" />
                    <a href="crudBusca.php"><h3 class="voltar">voltar</h3></a>
                </form>

                <?php

                    if (isset($_POST['submit'])) {
                        include 'resize_class.php';

                        $id_liv = $_GET['id'];

                        $consulta = $cn->query("SELECT img_liv FROM livro WHERE id_liv='$id_liv'");
                        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

                        $nome = $_POST['txtliv'];
                        $categoria = $_POST['sltcat'];
                        $valor = $_POST['txtpreco'];
                        $desc = $_POST['txtdesc'];
                        $qtd = $_POST['txtqtd'];

                        $valor = str_replace('.', '', $valor);
                        $valor = str_replace(',', '.', $valor);

                        $recebe_foto1 = $_FILES['txtfoto1'];
                        $destino = "./assets/images/";

                        if (!empty($recebe_foto1['name'])) {
                            preg_match("/\.(jpg|jpeg|png|gif){1}$/i", $recebe_foto1['name'], $extencao1);
                            $img_nome1 = md5(uniqid(time())) . "." . $extencao1[1];
                            $upload_foto1 = 1;
                        } else {
                            $img_nome1 = $exibe['img_liv'];
                            $upload_foto1 = 0;
                        }

                        try {
                            $alterar = $cn->query("
                                UPDATE livro SET  
                                    nome_liv = '$nome',
                                    id_categoria = '$categoria',
                                    valor = '$valor',
                                    quant_liv = '$qtd',
                                    desc_liv = '$desc',
                                    img_liv = '$img_nome1'	
                                WHERE id_liv = '$id_liv'
                            ");

                            if ($upload_foto1 == 1) {
                                move_uploaded_file($recebe_foto1['tmp_name'], $destino . $img_nome1);
                            }

                            header('location:crudBusca.php');
                        } catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                ?>
            </div>
        </section>

    </body>
</html>
