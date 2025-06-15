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
    <title>Painel - acadlist</title>
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
                    <li><a href="turmacrud.php">Registrar Turma</a></li>
                </div>
            </ul>
            <form action="/acadlist/require/logout.php " method="post" id="logout">
                <input type="submit" value="Sair" class="botao">
            </form>
        </nav>  
    </aside>
    <main id="conteudo">
        <div class="icone_total">
            <img src="assets/img/Alunostotais.png" alt="icone" class="icone">
        </div>
        <div class="total">
            <h4>Alunos Cadastrados</h4>
        </div>
        <div class="icone_total">
            <img src="assets/img/Professorestotais.png" alt="icone" class="icone">
        </div>
        <div class="total">
            <h4>
                Professores Cadastrados
            </h4>
        </div>
        <div class="icone_total">
            <img src="assets/img/Turmastotais.png" alt="icone" class="icone">
        </div>
        <div class="total">
            <h4>
                Turmas Cadastradas
            </h4>
        </div>
    </main>
</body>

</html>