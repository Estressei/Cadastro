<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $sexo = $_POST['sexo'];
    $idade = $_POST['idade'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $aluno = [
        'nome' => $nome,
        'ra' => $ra,
        'sexo' => $sexo,
        'idade' => $idade,
        'endereco' => $endereco,
        'telefone' => $telefone,
        'email' => $email
    ];

    if (!isset($_SESSION['alunos'])) {
        $_SESSION['alunos'] = [];
    }
    $_SESSION['alunos'][] = $aluno;

    header("Location: cadastrados.php");
    exit();
}
?>
