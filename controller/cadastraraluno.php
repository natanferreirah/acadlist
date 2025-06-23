<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['nome'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['status'])) {
        $nome = trim($_POST['nome']);
        $cpf = trim($_POST['cpf']);
        $data_nascimento = trim($_POST['data_nascimento']);
        $status = trim($_POST['status']);

        if (!empty($nome) && !empty($cpf) && !empty($data_nascimento) && !empty($status)) {
            $stmt = $conexao->prepare("SELECT id_aluno FROM alunos WHERE cpf= :cpf");
            $stmt->bindValue(':cpf', $cpf);
            $stmt->execute();
            if ($stmt->fetch()) {
                $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>CPF já cadastrado</p>";
                header("location: ../CRUDaluno/formcadastroaluno.php");
                exit();
            }
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
                $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao cadastrar aluno</p>";
                header("location: ../CRUDaluno/formcadastroaluno.php");
                exit();
            }
        } else {
            $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Preencha todos os campos obrigatórios.</p>";
            header("location: ../CRUDaluno/formcadastroaluno.php");
            exit();
        }
    }
} else {
    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
    header("Location: ../CRUDaluno/alunocrud.php");
    exit();
}
