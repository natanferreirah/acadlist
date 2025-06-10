<?php 
    require_once 'require/conexao.php';
    $usuario = trim($_POST['usuario']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $nome = trim($_POST['nome']);
    $nivel = $_POST['niveis'];
    if (!empty($usuario) && !empty($senha)) {
        $stmt = $conexao-> prepare("INSERT INTO usuarios (usuario, nome, senha, conta_nivel) VALUES (:usuario, :nome, :senha, :nivel)");
        $stmt-> bindValue(':usuario',$usuario); 
        $stmt-> bindValue(':nome',$nome); 
        $stmt-> bindValue(':senha',$senha);
        $stmt-> bindValue(':nivel',$nivel);
        if ($stmt->execute()) {
           $_SESSION['id_usuario'] = 'Dados cadastrados com sucesso';
           header("location: login.php");
        }
        else {
            echo "Erro ao cadastrar os dados";
        }
    } else {
        echo "Preencha os campos";
    }
