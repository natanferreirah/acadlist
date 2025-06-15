<?php
require_once '../require/conexao.php';
session_start();
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
        $_SESSION['sucesso_cadastrar'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Aluno cadastrado com sucesso</p>"; 
        header("location: ../alunocrud.php");
        exit();
    } else {
    $_SESSION['erro_cadastrar'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Erro ao cadastrar aluno</p>";
    header("location: ../formcadastroaluno.php");
    exit();
}
} else {
    $_SESSION['erro_cadastrar'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha todos o campos";
    header("location: ../formcadastroaluno.php");
    exit();
}