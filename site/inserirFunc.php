<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_insertFunc.css"/>
        <title>Cadastrar funcionário</title>
        <script src="./assets/js/jquery.js"></script>
        <script src="jquery.mask.js"></script>

        <script>    
            $(document).ready(function(){
                
                $("#cpf").mask("000.000.000-00");
                
            });
        </script>
    </head>
    <body>

        <?php


            include 'conexao.php';	
            
        ?>

        <section class="area-login">

            <!--tela de cadastro-->
        
            <div class="login">
                <div class="titulo">
                    <p><b>Cadastrar Funcionário</b></p>
                </div>

                <form method="post" action="inserirFunc.php" >
                    <input type="text" name="txtnome"  placeholder="insira o nome..." required id="txtnome"/>
                    <input type="email" name="txtemail"  placeholder="insira o e-mail..." autofocus required id="txtemail"/>
                    <input type="text" name="txtcpf"  placeholder="insira o cpf..." required id="cpf"/>
                    <input type="password" name="txtsenha"  placeholder="senha..." required id="txtsenha"/>
                    <input class="button" type="submit" name="submit" value="CADASTRAR" />
                </form>
                <a href="areaAdm.php"><h3 class="voltar">Voltar</h3></a> 

                <?php                    
                    include 'conexao.php';
                    $nome = $_POST['txtnome'];
                    $email = $_POST['txtemail'];
                    $senha = $_POST['txtsenha'];
                    $cpf = $_POST['txtcpf'];

                    $consultar = $cn->query("select cpf_usu, email_usu from usuario where cpf_usu='$cpf' or email_usu='$email'");
                    $exibe = $consultar->fetch(PDO::FETCH_ASSOC);

                    if($consultar->rowCount()>=1 && isset($_POST['submit']))
                    {
                        echo "<script lang='JavaScript'> window.alert('Funcionario já cadastrado!'); window.location.href='inserir-funcionário.php';</script>";
                    } else if (isset($_POST['submit'])){

                        $inserirFunc = $cn->query("insert into usuario (nome_usu, email_usu, senha_usu, CPF_usu, ds_status)
                        values ('$nome','$email', '$senha', '$cpf', 1)");    
                        echo "<script lang='JavaScript'> window.alert('Funcionário cadastrado com sucesso!'); window.location.href='areaAdm.php';</script>";
                    }
                ?>
            </div>
        </section>
    </body>
</html>