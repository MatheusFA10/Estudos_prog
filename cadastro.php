<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar'])) {
    // Coletando os dados do formulário
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Hash da senha para armazenamento seguro
    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

    // Protege contra SQL injection usando prepared statements
    $stmt = $conn->prepare("INSERT INTO medicos (nome, especialidade, crm, usuario, senha) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nome, $especialidade, $crm, $usuario, $senha_cripto);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso! Você pode fazer login agora.";
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }

    // Fechar a conexão
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Médico</title>
</head>
<body>
    <h2>Cadastro de Médico</h2>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Especialidade: <input type="text" name="especialidade" required><br>
        CRM: <input type="text" name="crm" required><br>
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
</body>
</html>