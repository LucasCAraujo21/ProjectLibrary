<div class="conteiner-fluid">
        
    <h1 class="text-center">Carrinho</h1>
    <?php
        $total = null;//variavel total que recebe valor nulo

        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho'] = array();
        }

        //criando um loop para a sessão carrinho receber o $cd e a quantidade
        foreach($_SESSION['carrinho'] as $cd => $qnt){
        $consulta = $cn->query("select * from livro where id_liv='$cd'");
        $exibe = $consulta->fetch(PDO::FETCH_ASSOC);

        $livro = $exibe['nome_liv']; //recebe o nome do livro
        $preco = number_format(($exibe['valor']),2,',','.'); //recebe o valor
        $total += $exibe['valor'] * $qnt; //calcula o preco de todos os itens no carrinho
    ?>
    
    <div class="row align-items-center" style="margin-top: 15px;  margin-left: 100px;">
    
        <div class="col-sm-2 col-md-offset-3">
            <img src="./assets/images/<?php echo $exibe['img_liv'];?>" class="img-fluid">
        </div>

        <div class="col-sm-2">
            <b><?php echo $exibe['nome_liv']; ?></b>
        </div>

        <div class="col-sm-2">
            <b >R$ <?php echo $exibe['valor']; ?></b>
        </div>

        <div class="col-sm-2">
            <b>Quantidade: <?php echo $qnt; ?></b>
        </div>

        <div class="col-sm-1 col-xs-offset-right-1" style="paddig-top:2px">        
            <!-- remove o item do carrinho pelo id -->     
            <a href="removeCarrinho.php?cd=<?php echo $cd;?>">
            <button type="submit" class="btn btn-success col-md-6">Excluir</button>
            <span class="glyphicon glyphicon-remove"> </span>  
            </button>
            </a>               
        </div> 
    </div>		

</div>

<?php } ?>
	
