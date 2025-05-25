<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style_login.css">

        <title>Faça seu login!</title>
    </head>
    <body>

        <?php 
            include 'conexao.php';
        ?>
        
        <div class="container-fluid">
            <main class="container">
                <form name="frmusuario" method="post" action="validausuario.php">
                    <h1>Faça seu Login!</h1>
                    <div class="input-box">
                        <input name="txtmail" type="email" placeholder="Email">
                        <i class="bx bxs-user"></i>
                    </div>

                    <div class="input-box">
                        <input name="txtsenha" type="password" placeholder="Senha">
                        <i class="bx bxs-lock-alt"></i>
                    </div>

                    <div class="remember-forgot">
                        <label for="">
                            <input type="checkbox">
                            Lembrar senha
                        </label>

                        <a href="recupSenha.php">Esqueci a senha</a>
                    </div>

                    <button type="submit" class="login">Login</button>

                    <div class="register-link">
                        <p>Não tem uma conta? <a href="cadastro.php">Cadastre-se</a></p>
                    </div>

                    <div class="register-link">
                        <p><a href="index.php">Voltar</a></p>
                    </div>
                </form>
            </main>
        </div>
    </body>
</html>