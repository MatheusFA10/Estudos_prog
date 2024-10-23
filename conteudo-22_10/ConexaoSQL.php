<?php

    $server = 'localhost';
    $bd = 'sistema_notas';
    $user = 'root';
    $pass = '';

    try{
        $conn = new PDO("mysql:host=$server;dbname=$bd", $user, $pass);
    }catch(PDOException $excecao){
        echo "Erro exeption: " . $excecao->getMessage();
    }


?>