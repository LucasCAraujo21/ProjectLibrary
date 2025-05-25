<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_selecionar.css"/>
    <title>Menu</title>
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
	
	
	?>

    <section class="area-login">

        <!--tela de seleção-->
       
        <div class="login">
            <div>
                <img src="assets/images/logonobg.png">
            </div>

            <form>
                <a href="inserirFunc.php"> <input class="button" type="button" name="insert-func" value="Inserir funcionário"/></a>
                <a href="crudBusca.php"><input class="button" type="button" name="Insert-prod" value="Inserir/pesquisar produto"  /></a>
            </form>
            <a href="index.php"><h4 class="voltar">Voltar</h4></a> 
        </div>
    </section>
</body>
</html>