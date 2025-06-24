<?php
require_once '../require/conexao.php';
require_once '../require/protect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logoicone.ico" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/formcadastro.css">
    <title>Formulário de Edição - acadlist</title>
</head>
<body>
    <aside id="menu">
        <div id="container_logo">
            <img src="../assets/img/logo2.png" alt="acadlist">
        </div>
        <nav id="navbar">
            <ul>
                <a href="../painel.php">
                    <div class="opcao">
                        <img src="../assets/img/painel.png" alt="" class="icone">
                        <li>Painel</li>
                    </div>
                </a>
                <a href="alunocrud.php">
                    <div class="opcao">
                        <img src="../assets/img/aluno.png" alt="" class="icone">
                        <li>Cadastra Aluno</li>
                    </div>
                </a>
                <a href="">
                    <div class="opcao">
                        <img src="../assets/img/turma.png" alt="" class="icone">
                        <li>Cadastrar Professor</li>
                    </div>
                </a>
                <a href="">
                    <div class="opcao">
                        <img src="../assets/img/materia.png" alt="" class="icone">
                        <li>Registrar Matéria</li>
                    </div>
                </a>
                <a href="turmacrud.php">
                    <div class="opcao">
                        <img src="../assets/img/turma.png" alt="" class="icone">
                        <li>Registrar Turma</li>
                    </div>
                </a>
            </ul>
            <form action="/acadlist/require/logout.php " method="post" id="logout">
                <input type="submit" value="Sair" class="botao">
            </form>
        </nav>
    </aside>
    <?php
    if (isset($_GET['id']) &&  !empty($_GET['id'])) {
        $id_turma = trim($_GET['id']);
        $stmt = $conexao->prepare("SELECT * FROM turmas WHERE id_turma = :id_turma");
        $stmt->bindValue(':id_turma', $id_turma, PDO::PARAM_INT);
        $stmt->execute();
        $turma = $stmt->fetch();
    } else {
        $_SESSION['erro'] = "<p style='color: red; font-weight:600; text-align: center;'>ID inválido.</p>";
        header("location: turmacrud.php");
        exit();
    }
    ?>
    <main id="conteudo">
        <form action="../controller/editarturma.php" method="post" id="container_form">
            <input type="hidden" name="id_turma" value="<?php echo $turma['id_turma']; ?>">
            <div class="rotulo">
                <label for="serie">Série:</label>
            </div>
            <div class="input_box">
                <input type="text" name="serie" id="serie" value="<?php echo $turma['serie']; ?>">
            </div>
            <div class="rotulo">
                <label for="sala_atribuida">Sala Atribuida:</label>
            </div>
            <div class="input_box">
                <input type="text" name="sala_atribuida" id="sala_atribuida" value="<?php echo $turma['sala_atribuida'] ?>">
            </div>
            <div class="rotulo">
                <label for="ano_letivo">Ano Letivo:</label>
            </div>
            <div class="input_box">
                <input type="number" min="2000" max="2050" name="ano_letivo" id="ano_letivo" value="<?php echo $turma['ano_letivo'] ?>">
            </div>
            <div class="rotulo">
                <label for="turno">Turno:</label>
            </div>
            <div class="input_box">
                <select name="turno" id="turno">
                    <option value="Manhã">Manhã</option>
                    <option value="Tarde">Tarde</option>
                    <option value="Noite">Noite</option>
                    <option value="Integral">Integral</option>
                </select>
            </div>
            <?php 
                  if (isset($_SESSION['sucesso'])) {
                        echo $_SESSION['sucesso'];
                        unset($_SESSION['sucesso']);
                    }
                    if (isset($_SESSION['erro'])) {
                        echo $_SESSION['erro'];
                        unset($_SESSION['erro']);
                    }
            ?>
            <div id="botao_container">
                <div class="input_botao">
                    <input type="submit" value="Salvar">
                </div>
                <div id="link_container">
                    <a href="turmacrud.php" onclick="return confirm('Tem certeza que deseja voltar?')">Voltar</a>
                </div>
            </div>
        </form>
    </main>
</body>
</html>