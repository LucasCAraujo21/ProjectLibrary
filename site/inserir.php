<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="estilo_inserir.css"/>
        <script src="./assets/js/jquery.js"></script>
        <script src="jquery.mask.js"></script>
        <title>Editar livro</title>

        <script>
            $(document).ready(function(){
                
            $('#preco').mask('000.000.000.000.000,00', {reverse: true});
                
            });
        </script>

        <?php
            session_start();

            //se a sessão id estiver vazia ou se a sessão status for diferente de adm, execute
            if (empty($_SESSION['ID'])) {
                header("location:index.php");
            }

            include 'conexao.php';         
            include 'resize_class.php';

            if(empty($_SESSION['ID']))
            {
                header("location:index.php");
            }

            $consultaCat = $cn->query("SELECT * FROM categoria union SELECT * FROM categoria");	
        ?>

    </head>
    <body>
        <section class="area-login">

            <!--tela de cadastro livro-->
            
            <div class="login">
                <div>
                    <p class="titulo">Cadastrar livro</p>
                </div>

                <form method="post" action="inserir.php" enctype="multipart/form-data">

                    <input type="text" name="txtliv"  placeholder="Nome do livro..." required id="txtliv"/>

                    <select class="form-control" name="sltcat">
                        <?php  
                            while($exibeCat = $consultaCat->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <option value="<?php echo $exibeCat['id_categoria']; ?>"><?php echo $exibeCat['ds_categoria']; ?></option>
                        <?php }?>
                    </select>

                    <input type="text" name="txtpreco"  placeholder="Preço" required id="preco"/>

                    <input type="number" name="txtqtd"  placeholder="Quantidade..." required id="txtqtd"/>

                    <br/>
                    <h2 >descrição</h2>
                    <textarea class="area" rows="5" name="txtdesc"></textarea>

                    <input type="file" accept="image/*" class="form-control" name="txtfoto1" required id="txtfoto1">


                    <input class="button" type="submit" name="submit" value="CADASTRAR" />
                    <a href="crudBusca.php"><h3 class="voltar">Voltar</h3></a> 
                </form>

                <?php               

                    if(isset($_POST['submit']))
                    {            
                        //variáveis que vão receber os dados do formulário que esta na pagina formlivro
                        $nome_liv= $_POST['txtliv'];
                        $categoria = $_POST['sltcat']; // recebendo o valor do campo select, valor numérico
                        $preco = $_POST['txtpreco'];
                        $qtd = $_POST['txtqtd'];
                        $desc = $_POST['txtdesc'];

                        $remover1='.';  // criando variável e atribuindo o valor de ponto para ela
                        $preco = str_replace($remover1, '', $preco); // removendo ponto de casa decimal,substituindo por vazio
                        $remover2=','; // criando variável e atribuindo o valor de virgula para ela
                        $preco = str_replace($remover2, '.', $preco); // removendo virgula de casa decimal,substituindo por ponto

                        $recebe_img1 = $_FILES['txtfoto1'];

                        $destino = "assets/images/";  // informando para qual diretorio será enviado a imagem

                        $extensao = strtolower(pathinfo($recebe_img1['name'], PATHINFO_EXTENSION));
                        $formatosPermitidos = ['jpg', 'jpeg', 'png', 'gif'];

                        if (in_array($extensao, $formatosPermitidos)) {
                            $img_nome1 = md5(uniqid(time())) . "." . $extensao;
                        } else {
                            echo "<script>alert('Formato de imagem inválido.'); history.back();</script>";
                            exit;
                        }


                        try{
                            $inserir=$cn->query("INSERT INTO livro (nome_liv, id_categoria, valor, quant_liv, desc_liv, img_liv) VALUES ('$nome_liv', '$categoria', '$preco', '$qtd', '$desc', '$img_nome1')");                    
                            
                            move_uploaded_file($recebe_img1['tmp_name'], $destino.$img_nome1);       

                            echo "<script lang='JavaScript'> window.alert('livro cadastrado com sucesso!'); window.location.href='crudBusca.php';</script>";
                        }catch (PDOException $e) {
                            echo $e->getMessage();
                        }
                    }
                ?>
            </div>

        </section>
    </body>
</html>