<?php
$servername = "localhost"; // ou o seu servidor
$username = "root"; // seu usuário
$password = ""; // sua senha
$dbname = "medicos_db";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>