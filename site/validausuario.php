<script type="text/javascript">
    <?php
        include 'conexao.php';

        session_start(); // iniciando uma sessao

        $Vmail = $_POST['txtmail'];
        $Vsenha = $_POST['txtsenha'];

        //echo $Vmail.'<br>';
        //echo $senha.'<br>';

        $consulta = $cn->query("select * from usuario where email_usu = '$Vmail' and senha_usu = '$Vsenha'");

        if($consulta-> rowCount()==1){
            $exibeUsu = $consulta->fetch(PDO::FETCH_ASSOC);

            if($exibeUsu['ds_status']==00){
                $_SESSION['ID'] = $exibeUsu['id_usu'];
                $_SESSION['Status']=0;
                header('location:index.php');
            }
            else{
                $_SESSION['ID'] = $exibeUsu['id_usu'];
                $_SESSION['Status']=1;
                header('location:index.php');
            } 
        }
        else{
            echo "alert('Usuario não existe');";
            echo "window.location.replace('login.php');";
        }



    ?>
</script>