<?php 
require_once '../require/conexao.php';
require_once '../require/protect.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conexao->prepare("DELETE FROM alunos WHERE id_aluno = :id_aluno");
    $stmt->bindValue(':id_aluno', $id);
        if ($stmt->execute()) {
            $_SESSION['sucesso'] = "<p style='color: green; font-weight:600; text-align: center;'>Aluno excluído com sucesso!</p>";
            header("location: ../CRUDaluno/alunocrud.php");
            exit();
        } else {
            $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao excluir aluno.</p>";
            header("location: ../CRUDaluno/alunocrud.php");
            exit();
        }
} else {
    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>ID do aluno não fornecido.</p>";
    header("location: ../CRUDaluno/alunocrud.php");
    exit();
}

?>
