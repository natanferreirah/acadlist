<?php
require_once 'require/conexao.php';
require_once 'require/protect.php';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logoicone.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/formcadastro.css">
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
        <form action="controller/cadastraraluno.php" method="post" id="container_form">
            <div class="rotulo">
                <label for="nome">Nome:</label>
            </div>
            <div class="input_box">
                <input type="text" name="nome" id="nome">
            </div>
            <div class="rotulo">
                <label for="cpf">CPF:</label>
            </div>
            <div class="input_box">
                <input type="text" name="cpf" id="cpf">
            </div>
            <div class="rotulo">
                <label for="data">Data de Nascimento:</label>
            </div>
            <div class="input_box">
                <input type="date" name="data_nascimento" id="data_nascimento">
            </div>
            <div class="rotulo">
                <label for="turma">Turma:</label>
            </div>
            <div class="input_box">
                <input type="text" name="turma" id="turma">
            </div>
            <div class="rotulo">
                <label for="status">Status:</label>
            </div>
            <div id="select">
                <select name="status" class="select">
                    <option value="Ativo">Ativo</option>
                    <option value="Transferido">Transferido</option>
                </select>
            </div>
            <div id="botao_container">
                <div class="input_botao">
                    <input type="submit" value="Salvar">
                </div>
                <div id="link_container">
                    <a href="alunocrud.php">Voltar</a>
                </div>
            </div>
        </form>
    </main>
</body>

</html>