<?php
session_start();
require_once '../require/conexao.php';
require_once '../require/protect.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']); 
    $data_nascimento = trim($_POST['data_nascimento']); 
    $status_aluno = trim($_POST['status_aluno']);
    $stmt = $conexao->query("SELECT id_aluno FROM alunos WHERE id_aluno = :id_aluno");
    $stmt->bindValue(':id_aluno', $id_aluno, PDO::PARAM_INT);
    $stmt->execute();
    $id_aluno = $stmt->fetch();

    if (empty($nome) || empty($cpf) || empty($data_nascimento) || empty($status_aluno)) {
        $_SESSION['erro_atualizar_form'] = "Todos os campos obrigatórios devem ser preenchidos.";
        header("Location: ../formeditar.php?id=" . $id_aluno);
        exit();
    }

    // Validar formato da data (exemplo)
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $data_nascimento)) {
        $_SESSION['erro_atualizar_form'] = "Formato de data de nascimento inválido. Use YYYY-MM-DD.";
        header("Location: ../formeditar.php?id=" . $id_aluno);
        exit();
    }

    try {
        $sql = "UPDATE alunos 
                SET nome = :nome, 
                    cpf = :cpf, 
                    data_nascimento = :data_nascimento, 
                    status_aluno = :status_aluno 
                WHERE id_aluno = :id_aluno";
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':status_aluno', $status_aluno);
        $stmt->bindParam(':id_aluno', $id_aluno, PDO::PARAM_INT);

        if ($stmt->execute()) {
            $_SESSION['sucesso_atualizar'] = "Aluno atualizado com sucesso!";
            header("Location: ../alunocrud.php");
            exit();
        } else {
            $_SESSION['erro_atualizar'] = "Erro ao atualizar aluno. Tente novamente.";
            header("Location: ../formeditar.php?id=" . $id_aluno);
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['erro_atualizar'] = "Erro no banco de dados ao atualizar: " . $e->getMessage();
        header("Location: ../formeditar.php?id=" . $id_aluno);
        exit();
    }
} else {
    $_SESSION['erro_atualizar'] = "Método de requisição inválido.";
    header("Location: ../alunocrud.php");
    exit();
}
?>
