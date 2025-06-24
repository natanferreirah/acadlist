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
    <title>Cadastro de Turma - acadlist</title>
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
            <form action="../acadlist/require/logout.php " method="post" id="logout">
                <input type="submit" value="Sair" class="botao">
            </form>
        </nav>
    </aside>
    <main id="conteudo">
        <h1 class="titulo_crud">Cadastrar Turma</h1>   
        <div id="table_container_turma">
        <table>
            <thead>
                <tr>
                    <th class="cabecalho">ID</th>
                    <th class="cabecalho">Série</th>
                    <th class="cabecalho">Sala Atríbuida</th>
                    <th class="cabecalho">Turno</th>
                    <th class="cabecalho">Ano Letivo</th>
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


                $stmt = $conexao->query("SELECT * FROM turmas");
                while ($turma = $stmt->fetch()) {
                    echo "<tr>";
                    echo "<td class='conteudo'>{$turma['id_turma']}</td>";
                    echo "<td class='conteudo'>{$turma['serie']}</td>";
                    echo "<td class='conteudo'>{$turma['sala_atribuida']}</td>";
                    echo "<td class='conteudo'>{$turma['turno']}</td>";
                    echo "<td class='conteudo'>{$turma['ano_letivo']}</td>";
                    echo '<td class="botao_crud"><a href="formeditarturma.php?id=' . $turma['id_turma'] . '" class="editar">Editar</a></td>';
                    echo '<td class="botao_crud"><a href="../controller/excluirturma.php?id=' . $turma['id_turma'] . '" onclick="return confirm(\'Tem certeza que deseja excluir?\')" class="excluir">Excluir</a></td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
        </div>
        <form action="formcadastroturma.php" method="post">
            <input type="submit" value="Cadastrar" class="botao_cadastrar">
        </form>
    </main>
</body>

</html>