<?php 
require_once '../require/conexao.php';
require_once '../require/protect.php';


$sala_atribuida = trim($_POST['sala_atribuida']);
$turno = trim($_POST['turno']);
$ano_letivo = trim($_POST['ano_letivo']);
$serie = trim($_POST['serie']);

if (!empty($sala_atribuida) && !empty($turno) && !empty($ano_letivo) && !empty($serie)) {
    $stmt = $conexao->prepare("INSERT INTO turmas (sala_atribuida, turno, ano_letivo, serie) VALUES (:sala_atribuida, :turno, :ano_letivo, :serie)");
    $stmt->bindValue(':sala_atribuida', $sala_atribuida);
    $stmt->bindValue(':turno', $turno);
    $stmt->bindValue(':ano_letivo', $ano_letivo);
    $stmt->bindValue(':serie', $serie);
    if ($stmt->execute()) {
        $_SESSION['sucesso_cadastrar_turma'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Turma cadastrada</p>";
        header("location: ../turmacrud.php");
        exit();
    }
} else {
    $_SESSION['erro_cadastrar_turma'] = "<p style='color: #03BBEE; font-weight:600; text-align: center;'>Preencha todos os campos";
    header("location: ../formcadastroturma.php");
    exit();
}
?>
?>