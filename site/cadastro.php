<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style_login.css">
    <title>Cadastre-se!</title>
</head>
    <body>

        <?php 
            include 'conexao.php';
        ?>

        <div class="conteiner-fluid">
            <main class="container">
                <form method="post" action="inserirusuario.php" name="login">
                    <h1>Faça seu Cadastro!</h1>
                    <div class="input-box">
                        <input type="text" name="txtnome" placeholder="nome">
                        <i class="bx bxs-user"></i>
                    </div>

                    <div class="input-box">
                        <input type="email" name="txtemail" placeholder="email">
                        <i class="bx bxs-user"></i>
                    </div>

                    <div class="input-box">
                        <input type="text" name="txtcpf" placeholder="CPF">
                        <i class="bx bxs-user"></i>
                    </div>


                    <div class="input-box">
                        <input type="password" name="txtsenha" placeholder="Senha">
                        <i class="bx bxs-lock-alt"></i>
                    </div>

                    <button type="submit" class="login">Registrar-se</button>

                    <div class="register-link">
                        <p><a href="index.php">Voltar</a></p>
                    </div>

                </form>
            </main>
        </div>
    </body>
</html>