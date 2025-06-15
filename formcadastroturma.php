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
        <form action="controller/cadastrarturma.php" method="post" id="container_form">
            <input type="hidden" name="id_turma" value="">
            <div class="rotulo">
                <label for="serie">Série:</label>
            </div>
            <div class="input_box">
                <input type="text" name="serie" id="serie">
            </div>
            <div class="rotulo">
                <label for="ano_letivo">Ano Letivo:</label>
            </div>
            <div class="input_box">
                <input type="number" min="2000" max="2050" name="ano_letivo" id="ano_letivo">
            </div>
            <div class="rotulo">
                <label for="sala_atribuida">Sala Atríbuida:</label>
            </div>
            <div class="input_box">
                <input type="text" name="sala_atribuida" id="sala_atribuida">
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
            <div id="botao_container">
            <div class="input_botao">
                <input type="submit" value="Salvar">
            </div>
            <div id="link_container">
                <a href="turmacrud.php">Voltar</a>
            </div>
        </form>
    </main>
</body>

</html>