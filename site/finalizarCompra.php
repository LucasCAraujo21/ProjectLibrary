<?php
    // iniciando a sessão, pois precisamos pegar o cd do usuario logado para salvar na tabela de vendas no campo cd_cliiente
    session_start();  

    include 'conexao.php';

    $data = date('Y-m-d');  // variavel que vai pegar a data do dia (ano mes dia -padrão do mysql)
    $ticket = uniqid();  // gerando um ticket com função uniqid(); 	gera um id unico    
    $cd_user = $_SESSION['ID'];  //recebendo o codigo do usuário logado, nesta pagina o usuario ja esta logado pois, em do carrinho de compra

    // criando um loop para sessão carrinho q recebe o $cd e a quantidade
    foreach($_SESSION['carrinho'] as $cd => $qtn)  {
        $consulta = $cn->query("select valor from livro where id_liv = '$cd'");
        $exibe=$consulta->fetch(PDO::FETCH_ASSOC);
        $preco = $exibe['valor'];
        
        
        $inserir = $cn->query("INSERT into venda(no_ticket, id_usu, id_liv, qt_liv, vl_liv, dt_venda)  VALUES
        ('$ticket','$cd_user','$cd','$qtn','$preco','$data')");

        unset($_SESSION['carrinho'][$cd]);

    }

	
    include 'fim.php'
?>
