
 <?php
    require_once 'require/conexao.php';
    session_start();

    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']); 
    if (!empty($usuario) && !empty($senha) ) {
        $stmt = $conexao->prepare("SELECT * FROM usuarios WHERE usuario = :usuario" );
        $stmt->bindValue(':usuario', $usuario);
        $stmt->execute();
        $usuariodb = $stmt->fetch();

        if  ($usuariodb && password_verify($senha, $usuariodb['senha'])) {
              if ($usuariodb['conta_nivel'] == 'Admin') {
                header("location: adminpage.php");
                exit();
            } else {
                $_SESSION['id_usuario'] = $usuariodb['id_usuario'];
                header("location: painel.php");
                exit();
            }
        } else { 
            $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Usuário ou senha incorreto</p>";
            header("location: login.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha os campos</p>";
        header("location: login.php");
        exit();
    }
?> 