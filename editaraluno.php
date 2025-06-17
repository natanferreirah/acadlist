<?php
session_start();
require_once '../require/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_aluno'], $_POST['nome'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['status'])) {
        $id_aluno = trim($_POST['id_aluno']);
        $nome = trim($_POST['nome']);
        $cpf = trim(preg_replace('/\D/', '', $_POST['cpf'])); // Remove não dígitos do CPF, se necessário
        $data_nascimento = trim($_POST['data_nascimento']);
        $status = trim($_POST['status']); // Corrigido de status_aluno para status
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
            }
            else {
                $_SESSION['erro_dados'] = "<p style='color: red; font-weight:600; text-align: center;'>Erro ao atualizar os dados.</p>";
                header("Location: ../alunocrud.php");
                exit();          
        } } else {
            $_SESSION['erro_preencher'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha todos os campos obrigatórios.</p>";
            header("Location: ../formeditar.php?id=" . urlencode($id_aluno) . "");
            exit();
        }
        }
} else {
    $_SESSION['erro_id'] = "<p style='color: red; font-weight:600; text-align: center;'>Acesso inválido.</p>";
    header("Location: ../alunocrud.php");
    exit();
}

?>
<!-- 
<?php 
session_start();
require_once '../require/conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id_aluno'], $_POST['nome'], $_POST['cpf'], $_POST['data_nascimento'], $_POST['status'])) {
        $id_usuario = trim($_POST['id_usuario']);
        $nome = trim($_POST['nome']);
        $cpf = trim(preg_replace('/\D/', '', $_POST['cpf']));
        $data_nascimento = trim($_POST['data_nascimento']);
        $status = trim($_POST['status']);
        if (!empty($id_aluno) && !empty($nome) && !empty($cpf) && !empty($data_nascimento) && !empty($status)){
            $stmt = $conexao->prepare("UPDATE aluno set nome = :nome, cpf = :cpf, data_nascimento = :data_nascismento, status_aluno = :status_aluno WHERE id_aluno = :id_aluno");
            $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
            $stmt->bindValue(':nome', $nome);
            $stmt->bindValue('cpf', $cpf);
            $stmt->bindValue('data_nascimento', $data_nascimento);
            $stmt->bindValue('status_aluno', $status);
            if ($stmt->execute()) {
                $_SESSION['sucesso_editar'] = "<p> Atualização feita com sucesso</p>";
                header("location: ../alunocrud.php");
                exit();
            } else {
                $_SESSION['erro_dados'] = "<p>Erro ao atualizar os dados </p>";
                header("location: ../alunocrud.php");
                exit();
            }
        } else {
            $_SESSION['erro_preencher'] = "<p>Preencha todos os campos obrigatórios</p>";
            header("location: alunocrud.php");
            exit();
        }
        } else {
            $SESSION['erro_dados'] = "<p>Dados inválidos</p>";
            header("location: alunocrud.php");
            exit();
        }
    } else{
        $_SESSION['erro_metodo'] = "<p>Acesso inválido</p>";
        header("location: alunocrud.php");
        exit();
    }

?> -->