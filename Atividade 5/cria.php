<?php
    include_once 'produto.php'; 
    session_start();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
        $nome = $_POST['nome'];
        $desc = $_POST['desc'];
        $valor = $_POST['valor'];
        $url = $_POST['url'];
    
    
        $produto = new Produto($nome, $desc, $valor, $url);
    
    
        if (!isset($_SESSION['produtos'])) {
            $_SESSION['produtos'] = [];
        }
    
    
        $_SESSION['produtos'][] = $produto;
    
        header("Location: mostra.php");
        exit();
    }
?>