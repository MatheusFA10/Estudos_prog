<?php
    include_once 'aluno.php';
    session_start();
    

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $nome = $_GET['nome'];
        $nasc = $_GET['nasc'];
        $email = $_GET['email'];
        $curso = $_GET['curso'];

        $aluno = new Aluno($nome, $nasc, $email, $curso);

    
        $_SESSION['aluno'] = serialize($aluno);

        header("Location: mostra.php");
        exit();
    }
?>