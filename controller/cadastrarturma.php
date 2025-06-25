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
            try {
                $stmt = $conexao->prepare("SELECT id_turma FROM turmas WHERE serie = :serie AND sala_atribuida = :sala_atribuida");
                $stmt->bindValue(':serie', $serie);
                $stmt->bindValue(':sala_atribuida', $sala_atribuida);
                $stmt->execute();
                if ($stmt->fetch()) {
                    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Já existe um cadastro com essa série e sala</p>";
                    header("location: ../views/formcadastroturma.php?id=$id_turma");
                    exit();
                }
                $stmt = $conexao->prepare("SELECT id_turma FROM turmas WHERE serie = :serie");
                $stmt->bindValue(':serie', $serie);
                $stmt->execute();
                if ($stmt->fetch()) {
                    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Esta série já está cadastrada.</p>";
                    header("location: ../views/formcadastroturma.php");
                    exit();
                }
                $stmt = $conexao->prepare("SELECT id_turma FROM turmas WHERE sala_atribuida = :sala_atribuida");
                $stmt->bindValue(':sala_atribuida', $sala_atribuida);
                $stmt->execute();
                if ($stmt->fetch()) {
                    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Esta sala já está atribuída a outra turma.</p>";
                    header("location: ../views/formcadastroturma.php");
                    exit();
                }
            } catch (Exception $e) {
                echo $e->getMessage();
            }
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
                $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Erro ao cadastrar turma!</p>";
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
