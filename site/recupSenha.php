<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="style_login.css">

        <title>Recupere sua senha</title>
    </head>
    <body>

        <?php 
            include 'conexao.php';
        ?>
        
        <div class="container-fluid">
            <main class="container">
                <form name="frmusuario" method="post" action="enviarEmail.php">
                    <h1>Digite seu email!</h1>
                    <div class="input-box">
                        <input name="txtmail" type="email" placeholder="Email">
                        <i class="bx bxs-user"></i>
                    </div>

                    <button type="submit" class="login">Enviar</button>

                    <div class="register-link">
                        <p><a href="index.php">Voltar</a></p>
                    </div>
                </form>
            </main>
        </div>
    </body>
</html>