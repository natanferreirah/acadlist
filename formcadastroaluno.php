<?php
require_once 'require/conexao.php';
require_once 'require/protect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="logoicone.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/painel.css">
    <title>Formulário de Cadastro - acadlist</title>
</head>

<body>

    <aside id="menu">
        <div id="container_logo">
            <img src="assets/img/logo2.png" alt="acadlist">
        </div>
        <nav id="navbar">
            <ul>
                <div class="opcao">
                    <a href="login.php"><img src="assets/img/painel.png" alt="" class="icone"></a>
                    <li><a href="painel.php">Painel</a></li>
                </div>
                <div class="opcao">
                    <img src="assets/img/aluno.png" alt="" class="icone">
                    <li><a href="alunocrud.php">Cadastrar Aluno</a></li>
                </div>
                <div class="opcao">
                    <img src="assets/img/professor.png" alt="" class="icone">
                    <li><a href="professorcrud.php">Cadastrar Professor</a></li>
                </div>
                <div class="opcao">
                    <img src="assets/img/materia.png" alt="" class="icone">
                    <li><a href="">Registrar Matéria</a></li>
                </div>
                <div class="opcao">
                    <img src="assets/img/turma.png" alt="" class="icone">
                    <li><a href="">Registrar Turma</a></li>
                </div>
            </ul>
            <form action="/acadlist/require/logout.php " method="post" id="logout">
                <input type="submit" value="Sair" class="botao">
            </form>
        </nav>
    </aside>
    <main id="conteudo">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matricula = (isset($_POST["matricula"]) && $_POST["matricula"] != null) ? $_POST["matricula"] : "";
            $nome = (isset($_POST["nome"]) && $_POST["nome"] != null) ? $_POST["nome"] : "";
            $cpf = (isset($_POST["cpf"]) && $_POST["cpf"] != null) ? $_POST["cpf"] :
                "";
            $data_nascimento = (isset($_POST["data_nascimento"]) && $_POST["data_nascimento"] != null) ?
                $_POST["data_nascimento"] : "";
            $turma = (isset($_POST["turma"]) && $_POST["turma"] != null) ?
                $_POST["turma"] : "";
            $status = (isset($_POST["status"]) && $_POST["status"] != null) ?
                $_POST["status"] : "";
        } elseif (!isset($matricula)) {
            $matricula = (isset($_GET["matricula"]) && $_GET["matricula"] != null) ? $_GET["matricula"] : "";
            $nome = NULL;
            $cpf = NULL;
            $data_nascimento = NULL;
            $turma = NULL;
            $status = NULL;
        }

        if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $nome != "") {
            try {
                $stmt = $conexao->prepare("INSERT INTO aluno (nome, cpf, data_nascimento) VALUES
(:nome, :cpf, :data_nascimento)");
                $stmt->bindValue(":nome", $nome);
                $stmt->bindValue(":cpf", $cpf);
                $stmt->bindValue(":data_nascimento", $data_nascimento);
                if ($stmt->execute()) {
                    if ($stmt->rowCount() > 0) {
                        echo "Dados cadastrados com sucesso!";
                        $matricula = null;
                        $nome = null;
                        $cpf = null;
                        $data_nascimento = null;
                    } else {
                        echo "Erro ao tentar efetivar cadastro";
                    }
                } else {
                    throw new PDOException("Erro: Não foi possível executar a declaração
sql");
                }
            } catch (PDOException $erro) {
                echo "Erro: " . $erro->getMessage();
            }
        }
        ?>
        <form action="create.php" method="post" id="form">
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$matricula}\"";
                }>
            <label for="matricula">Nome:</label>
            <input type="text" name="nome"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$nome}\"";
                }>
            <label for="matricula">CPF:</label>       
            <input type="text" name="cpf"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$cpf}\"";
                }>
            <label for="matricula">Data de Nascimento:</label>
            <input type="text" name="data_nascimento"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$data_nascimento}\"";
                }>
            <label for="matricula">Turma:</label>
            <input type="text" name="turma"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$turma}\"";
                }>
            <label for="matricula">Status:</label>
            <input type="text" name="status"
                if (isset($celular) && $celular !=null || $celular !="" ){
                echo "value=\" {$status}\"";
                }>
            <input type="submit" value="Salvar">
            <input type="reset" value="Novo">
        </form>
    </main>
</body>

</html>