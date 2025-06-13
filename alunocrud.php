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
    <link rel="stylesheet" href="assets/css/alunocrud.css">
    <title>Cadastro de Aluno - acadlist</title>
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
        <table border="1px" solid>
            <thead>
                <tr>
                    <th>Matrícula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                    <th>Turma</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conexao->query("SELECT * FROM alunos");

                while ($aluno = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$aluno['id_aluno']}</td>";
                    echo "<td>{$aluno['nome']}</td>";
                    echo "<td>{$aluno['cpf']}</td>";
                    echo "<td>" . date('d/m/Y', strtotime($aluno['data_nascimento'])) . "</td>";
                    echo "<td>--</td>";
                    echo "<td>{$aluno['status_aluno']}</td>";
                    echo '<td><a href="formeditar.php?id=' . $aluno['id_aluno'] . '">Editar</a></td>';
                    echo '<td><a href="controller/excluiraluno.php?id=' . $aluno['id_aluno'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este aluno?\')">Excluir</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <button><a href="formcadastroaluno.php">Cadastrar</a></button>
    </main>
</body>

</html>