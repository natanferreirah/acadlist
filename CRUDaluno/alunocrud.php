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
    <link rel="stylesheet" href="../assets/css/crud.css">
    <title>Cadastro de Aluno - acadlist</title>
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
                <a href="../alunocrud.php">
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
                <a href="../CRUDturma/turmacrud.php">
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
                if (isset($_SESSION['sucesso'])) {
                    echo $_SESSION['sucesso'];
                    unset($_SESSION['sucesso']);
                }
                if (isset($_SESSION['erro'])) {
                    echo $_SESSION['erro'];
                    unset($_SESSION['erro']);
                }

                $stmt = $conexao->query("SELECT * FROM alunos");

                while ($aluno = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td>{$aluno['id_aluno']}</td>";
                    echo "<td>{$aluno['nome']}</td>";
                    echo "<td>{$aluno['cpf']}</td>";
                    echo "<td>" . date('d/m/Y', strtotime($aluno['data_nascimento'])) . "</td>";
                    echo "<td>--</td>";
                    echo "<td colspan='1'>{$aluno['status_aluno']}</td>";
                    echo '<td><a href="formeditaraluno.php?id=' . $aluno['id_aluno'] . '" class="editar">Editar</a></td>';
                    echo '<td><a href="../controller/excluiraluno.php?id=' . $aluno['id_aluno'] . '" onclick="return confirm(\'Tem certeza que deseja excluir este aluno?\')" class="excluir">Excluir</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        <form action="formcadastroaluno.php" method="post">
            <input type="submit" value="Cadastrar" class="botao_cadastrar">
        </form>
    </main>
</body>

</html>