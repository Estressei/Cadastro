<?php
session_start();
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
    </section>
</body>
</html>