<?php 
    include "conexao.php";

    $recebe_email = $_POST['txtmail'];

    $consultaEmail = $cn->query("select nome_usu, email_usu, senha_usu from usuario where email_usu = '$recebe_email'");

    if($consultaEmail->rowCount() == 0){
        echo "<script lang='JavaScript'> window.alert('Email incorreto'); window.location.href='recupSenha.php';</script>";
    }
    else{
        echo "<script lang='JavaScript'> window.alert('Email enviado'); window.location.href='index.php';</script>";  
    }


?>
