<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_inserir.css"/>
        <script src="./assets/js/jquery.js"></script>
        <script src="jquery.mask.js"></script>

        <title>Alterar conta</title>

        <script>        
            $(document).ready(function(){
                
                $("#cpf").mask("000.000.000-00");
            });
        </script>
    </head>
    <body>

        <?php
        
            session_start();

            include 'conexao.php';	

            $id_usu = $_SESSION['ID'];
            $consulta = $cn->query("SELECT * FROM usuario WHERE id_usu='$id_usu'");	
            $exibe = $consulta->fetch(PDO::FETCH_ASSOC);
        ?>

        <section class="area-login">
            <!--tela de cadastro-->
            <div class="login">
                <div class="titulo">
                    <p ><b>Alterar Conta</b></p>
                </div>

                <form method="post" action="editar_usuario.php?id=<?php echo $exibe['id_usu'];?>" >
                    <input type="email" name="txtemail"  placeholder="insira o e-mail..." value="<?php echo $exibe['email_usu']?>" autofocus required id="txtemail"/>
                    <input type="text" name="txtnome"  placeholder="insira o nome..." value="<?php echo $exibe['nome_usu']?>" required id="txtnome">
                    <input type="text" name="txtcpf"  placeholder="insira o cpf..." value="<?php echo $exibe['CPF_usu']?>" required id="cpf"/>
                    <input type="password" name="txtsenha"  placeholder="senha..." value="<?php echo $exibe['senha_usu']?>" required id="txtsenha"/>
                    <input class="button" type="submit" name="submit" value="EDITAR" />
                    <a href="areaCliente.php"><h3 class="voltar">Voltar</h3></a> 
                </form>

                <?php
                    if (isset($_POST['submit'])){

                        $email = $_POST['txtemail'];
                        $nome = $_POST['txtnome'];
                        $cpf = $_POST['txtcpf'];
                        $senha = $_POST['txtsenha'];

                        try{
                            $alterar = $cn->query(
                                "update usuario set
                                    email_usu = '$email',
                                    nome_usu = '$nome',
                                    CPF_usu = '$cpf',
                                    senha_usu = '$senha'
                                where id_usu = '$id_usu'
                            ");

                            echo "<script lang='JavaScript'> window.alert('Conta alterada com sucesso!'); window.location.href='areaCliente.php';</script>";
                        }catch(PDOException $e) {  // se exsitir algum problema, será gerado uma mensagem de erro
                            echo $e->getMessage();  
                        }
                    }
                ?>
            </div>
        </section>
    </body>
</html>