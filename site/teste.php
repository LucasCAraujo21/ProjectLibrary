<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mostrar Livros</title>
    </head>
    <body>
        <?php
            include 'conexao.php';
            //variavel "consulta" que recebe variavel "cn"(conexao), no qual recebe o resultado de uma consulta no banco
            $consuta = $cn-> query('select * from vw_livro');

            //variavel "exibe" recebe o resultado da consulta em forma de matriz
            while($exibe = $consuta->fetch(PDO::FETCH_ASSOC)){

            echo $exibe['nome_liv'].'<br>';
            echo $exibe['valor'].'<br>';
            echo $exibe['desc_liv'].'<br>';
            echo $exibe['img_liv'].'<br>';
            echo $exibe['ds_categoria'].'<br>';
            echo $exibe['quant_liv'].'<br>';
            echo '<hr>';
            }

        ?>
    </body>
</html>