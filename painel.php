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
                 <a href="painel.php">
                    <div class="opcao">
                        <img src="assets/img/painel.png" alt="" class="icone">
                        <li>Painel</li>
                    </div>
                </a>
                 <a href="views/alunocrud.php">
                    <div class="opcao">
                        <img src="assets/img/aluno.png" alt="" class="icone">
                        <li>Cadastrar Aluno</li>
                    </div>
                </a>
                <a href="">
                    <div class="opcao">
                        <img src="assets/img/turma.png" alt="" class="icone">
                        <li>Cadastrar Professor</li>
                    </div>
                </a>
                 <a href="">
                    <div class="opcao">
                        <img src="assets/img/materia.png" alt="" class="icone">
                        <li>Registrar Matéria</li>
                    </div>
                </a>
                 <a href="views/turmacrud.php">
                    <div class="opcao">
                        <img src="assets/img/turma.png" alt="" class="icone">
                        <li>Registrar Turma</li>
                    </div>
                </a>
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