<?php
session_start();
require_once '../require/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_aluno'], $_POST['nome'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['status'])) {
        $id_aluno = trim($_POST['id_aluno']);
        $nome = trim($_POST['nome']);
        $cpf = trim( $_POST['cpf']);
        $data_nascimento = trim($_POST['data_nascimento']);
        $status = trim($_POST['status']);
        if (!empty($id_aluno) && !empty($nome) && !empty($cpf) && !empty($data_nascimento) && !empty($status)) {
            $stmt = $conexao->prepare("UPDATE alunos SET nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento, status_aluno = :status_aluno WHERE id_aluno = :id_aluno");
            $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':data_nascimento', $data_nascimento);
            $stmt->bindValue(':status_aluno', $status);
            if ($stmt->execute()) {
                $_SESSION['sucesso_editar'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Aluno editado com sucesso!</p>";
                header("location: ../alunocrud.php");
                exit();
            } else {
                $_SESSION['erro_dados'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao atualizar os dados.</p>";
                header("Location: ../alunocrud.php");
                exit();
            }
        } else {
            $_SESSION['erro_preencher'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha todos os campos obrigatórios.</p>";
            header("Location: ../formeditar.php?id=" . urlencode($id_aluno) . "");
            exit();
        }
    } else {
        $_SESSION['acesso_invalido'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
        header("Location: ../alunocrud.php");
        exit();
    }
} else {
    $_SESSION['erro_id'] = "<p style='color: red; font-weight:600; text-align: center;'>ID inválido.</p>";
    header("Location: ../turmacrud.php");
    exit();    
}
