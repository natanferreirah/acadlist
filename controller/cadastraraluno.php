<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

$nome = trim($_POST['nome']);
$cpf = trim($cpf = preg_replace('/\D/', '', $_POST['cpf']));
$data_nascimento = trim($_POST['data_nascimento']);
$status = trim($_POST['status']);

if (!empty($nome) && !empty($cpf) && !empty($data_nascimento) && !empty($status)) {
    $stmt = $conexao->prepare("INSERT INTO `alunos` (nome, cpf, data_nascimento, status_aluno) VALUES (:nome, :cpf, :data_nascimento, :status_aluno)");
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':cpf', $cpf);
    $stmt->bindValue(':data_nascimento', $data_nascimento);
    $stmt->bindValue(':status_aluno', $status);
    if ($stmt->execute()) {
        $_SESSION['sucesso'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Aluno cadastrado com sucesso</p>"; 
        header("location: ../CRUDaluno/alunocrud.php");
        exit();
    } else {
    $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Erro ao cadastrar aluno</p>";
    header("location: ../CRUDaluno/alunocrud.php");
    exit();
}
} else {
    $_SESSION['erro'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha todos o campos";
    header("location: ../CRUDaluno/alunocrud.php");
    exit();
}