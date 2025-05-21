<script type="text/javascript">
<?php

    include 'conexao.php';

    $nome = $_POST['txtnome'];
    $email = $_POST['txtemail'];
    $senha = $_POST['txtsenha'];
    $CPF = $_POST['txtcpf'];
/*
    echo $nome .'<br>';
    echo $email .'<br>';
    echo $senha .'<br>';
    echo $CPF .'<br>';*/

    //verifica se o usuario ja existe
    $consulta = $cn->query("select email_usu from usuario where email_usu='$email'");
    $exibe = $consulta -> fetch(PDO::FETCH_ASSOC);


    if($consulta->rowCount()==1){
        echo "alert('Email já existente');";
        echo "window.location.replace('index.php');";

    }
    else{
        $incluir = $cn->query("insert into usuario values(default, '$nome', '$email', '$CPF', '$senha', 0)");
        echo "alert('Usuário cadatrado com sucesso');";

        session_start(); // iniciando uma sessao

        $consulta = $cn->query("select * from usuario where email_usu = '$email' and senha_usu = '$senha'");

        if($consulta-> rowCount()==1){
            $exibeUsu = $consulta->fetch(PDO::FETCH_ASSOC);

            if($exibeUsu['ds_status']==00){
                $_SESSION['ID'] = $exibeUsu['id_usu'];
                $_SESSION['Status']=0;
                echo "window.location.replace('index.php');";

            }
            else{
                $_SESSION['ID'] = $exibeUsu['id_usu'];
                $_SESSION['Status']=1;
                echo "window.location.replace('index.php');";
            } 
        }

    }

?>
</script>