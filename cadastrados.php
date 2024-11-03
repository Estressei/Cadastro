<?php
session_start();

if (isset($_POST['excluir_todos'])) {
    unset($_SESSION['alunos']);
    header("Location: cadastrados.php");
    exit();
}

if (isset($_SESSION['alunos']) && !empty($_SESSION['alunos'])) {
    usort($_SESSION['alunos'], function($a, $b) {
        return $a['ra'] <=> $b['ra'];
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alunos Cadastrados</title>
    <link rel="stylesheet" type="text/css" href="cadastro.css">
</head>
<body>
    <nav>
        <p><a href="formulario.php">Cadastre-se</a></p>
        <p>Ver cadastrados</p>
    </nav>

    <section>
        <h1>Alunos Cadastrados</h1>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>RA</th>
                    <th>Sexo</th>
                    <th>Idade</th>
                    <th>Endereço</th>
                    <th>Telefone</th>
                    <th>E-mail</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['alunos']) && !empty($_SESSION['alunos'])) {
                    foreach ($_SESSION['alunos'] as $aluno) {
                        echo "<tr>
                                <td>{$aluno['nome']}</td>
                                <td>{$aluno['ra']}</td>
                                <td>{$aluno['sexo']}</td>
                                <td>{$aluno['idade']}</td>
                                <td>{$aluno['endereco']}</td>
                                <td>{$aluno['telefone']}</td>
                                <td>{$aluno['email']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Nenhum aluno cadastrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <form method="POST" action="cadastrados.php" class="excluir">
            <button type="submit" name="excluir_todos">Excluir todos os alunos</button>
        </form>
    </section>
</body>
</html>
