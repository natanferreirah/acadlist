<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_turma'], $_POST['sala_atribuida'], $_POST['turno'], $_POST['serie'], $_POST['ano_letivo'])) {
        $id_turma = trim($_POST['id_turma']);
        $sala_atribuida = trim($_POST['sala_atribuida']);
        $turno = trim($_POST['turno']);
        $serie = trim($_POST['serie']);
        $ano_letivo = trim($_POST['ano_letivo']);
        if (!empty($id_turma) && !empty($sala_atribuida) && !empty($serie) && !empty($ano_letivo)) {
            $stmt = $conexao->prepare("UPDATE turmas SET sala_atribuida = :sala_atribuida, turno = :turno, serie = :serie, ano_letivo = :ano_letivo WHERE id_turma = :id_turma");
            $stmt->bindValue(':id_turma', $id_turma, PDO::PARAM_INT);
            $stmt->bindValue(':sala_atribuida', $sala_atribuida);
            $stmt->bindValue(':turno', $turno);
            $stmt->bindValue(':serie', $serie);
            $stmt->bindValue(':ano_letivo', $ano_letivo);
            if ($stmt->execute()) {
                $_SESSION['sucesso'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Turma editada com sucesso!</p>";
                header("location: ../views/turmacrud.php");
                exit();
            } else {
                $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao atualizar os dados.</p>";
                header("Location: ../views/formeditarturma.php?id=$id_turma");
                exit();
            }
        } else {
            $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Preencha todos os campos obrigatórios.</p>";
            header("Location: ../views/formeditarturma.php?id=$id_turma");
            exit();
        }
    } else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
        header("Location: ../views/turmacrud.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>ID inválido.</p>";
    header("Location: ../views/turmacrud.php");
    exit();
}
