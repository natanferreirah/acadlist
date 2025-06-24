<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['serie'], $_POST['turno'], $_POST['sala_atribuida'], $_POST['ano_letivo'])) {
        $serie = trim($_POST['serie']);
        $turno = trim($_POST['turno']);
        $sala_atribuida = trim($_POST['sala_atribuida']);
        $ano_letivo = trim($_POST['ano_letivo']);

        if (!empty($sala_atribuida) && !empty($turno) && !empty($ano_letivo) && !empty($serie)) {
            $stmt = $conexao->prepare("INSERT INTO turmas (sala_atribuida, turno, ano_letivo, serie) VALUES (:sala_atribuida, :turno, :ano_letivo, :serie)");
            $stmt->bindValue(':serie', $serie);
            $stmt->bindValue(':turno', $turno);
            $stmt->bindValue(':sala_atribuida', $sala_atribuida);
            $stmt->bindValue(':ano_letivo', $ano_letivo);
            if ($stmt->execute()) {
                $_SESSION['sucesso'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Turma cadastrada!</p>";
                header("location: ../views/turmacrud.php");
                exit();
            } else {
                $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Turma cadastrada!</p>";
                header("location: ../views/formcadastroturma.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Preencha todos os campos";
            header("location: ../views/formcadastroturma.php");
            exit();
        }
    } else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
        header("Location: ../views/turmacrud.php");
        exit();
    }
} else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
        header("Location: ../views/turmacrud.php");
        exit();
    }
?>