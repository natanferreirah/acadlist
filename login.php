<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Login - acadlist</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="shortcut icon" href="assets/img/logoicone.ico" type="image/x-icon">
</head>
<body>
    <main id="container">
            <form action="verify.php" method="post">
                <div class="input_rotulo">
                    <label for="usuario" class="rotulo">Usuário:</label>
                </div>
                <div class="input_box">
                    <input type="text" name="usuario" id="" class="input_style">
                </div>
                <div class="input_rotulo">
                    <label for="senha" class="rotulo">Senha:</label>
                </div>
                <div class="input_box">
                    <input type="password" name="senha" id="" class="input_style">
                </div>
                <?php 
                    session_start();
                    if (isset($_SESSION['erro'])) {
                        echo $_SESSION['erro'];
    
                    }
                    session_unset();
                ?>
                <div class="input_enviar">
                    <input type="submit" value="Login" class="login">
                </div>
            </form>
    </main>
</body>
