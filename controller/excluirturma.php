<?php
session_start();
require_once '../require/conexao.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_turma = $_GET['id'];
    if (!empty($id_turma)) {
        $stmt = $conexao->prepare("DELETE FROM turmas WHERE id_turma = :id_turma");
        $stmt->bindValue(":id_turma", $id_turma, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $_SESSION['sucesso_excluir'] = "<p style='color: green; font-weight:600; text-align: center;'>Aluno excluído com sucesso!</p>";
            header("location: ../turmacrud.php");
            exit();
        } else {
            $_SESSION['erro_excluir'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao excluir aluno.</p>";
            header("location: ../turmacrud.php");
            exit();
        }
    } else {
        $_SESSION['erro_excluir'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao excluir aluno.</p>";
        header("location: ../turmacrud.php");
        exit();
    }
} else {
    $_SESSION['erro_id'] = "<p style='color: red; font-weight:600; text-align: center;'>ID do aluno não fornecido.</p>";
    header("location: ../turmacrud.php");
    exit();    
}
