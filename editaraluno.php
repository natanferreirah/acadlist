<?php
session_start();
require_once '../require/conexao.php';

 if (isset($_GET['id']) && !empty($_GET['id'])){
        $id_aluno = $_GET['id'];
        if ($_GET['id']) {
            $stmt = $conexao->prepare("SELECT * FROM alunos WHERE id_aluno = :id_aluno");
            $stmt->bindValue(':id_aluno', $_GET['id']);
            $stmt->execute();
            $aluno = $stmt->fetch();
        }
    }


?>
