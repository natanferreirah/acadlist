<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_aluno'], $_POST['nome'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['status'])) {
        $id_aluno = trim($_POST['id_aluno']);
        $nome = trim($_POST['nome']);
        $cpf = preg_replace('/[^0-9]/', '', trim($_POST['cpf']));
        $data_nascimento = trim($_POST['data_nascimento']);
        $status = trim($_POST['status']);

        if (!empty($id_aluno)  && !empty($nome)  && !empty($cpf)  && !empty($data_nascimento)  && !empty($status)) {
            $stmt = $conexao->prepare("SELECT id_aluno FROM alunos WHERE cpf= :cpf AND id_aluno != :id_aluno");
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->execute();
            if ($cpf_check = $stmt->fetch()) {
                $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>CPF já cadastrado</p>";
                header("location: ../views/formeditaraluno.php?id=$id_aluno");
                exit();
            }
            $stmt = $conexao->prepare("UPDATE alunos SET nome = :nome, cpf = :cpf, data_nascimento = :data_nascimento, status_aluno = :status_aluno WHERE id_aluno = :id_aluno");
            $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue(':cpf', $cpf);
            $stmt->bindValue(':data_nascimento', $data_nascimento);
            $stmt->bindValue(':status_aluno', $status);
            if ($stmt->execute()) {
                $_SESSION['sucesso'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Aluno editado com sucesso!</p>";
                header("location: ../views/alunocrud.php");
                exit();
            } else {
                $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao atualizar os dados.</p>";
                header("Location: ../views/formeditaraluno.php?id=$id_aluno");
                exit();
            }
        } else {
            $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Preencha todos os campos obrigatórios.</p>";
            header("Location: ../views/formeditaraluno.php?id=$id_aluno");
            exit();
        }
    } else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
        header("Location: ../views/alunocrud.php");
        exit();
    }
} else {
    $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>ID inválido.</p>";
    header("Location: ../views/alunocrud.php");
    exit();
}
