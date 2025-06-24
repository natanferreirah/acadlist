<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id_turma = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM turmas WHERE id_turma = :id_turma");
    $stmt->bindValue(":id_turma", $id_turma, PDO::PARAM_INT);
    if ($stmt->execute()) {
        $_SESSION['sucesso'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Turma excluída com sucesso!</p>";
        header("location: ../views/turmacrud.php");
        exit();
    } else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao excluir turma.</p>";
        header("location: ../views/turmacrud.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>ID da turma não fornecido.</p>"; // 
    header("location: ../views/turmacrud.php");
    exit();
}
