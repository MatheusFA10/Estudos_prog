<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

// Função para cadastrar o enfermeiro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar_enfermeiro'])) {
    // Coletando os dados do formulário
    $nome = $_POST['nome'];
    $coren = $_POST['coren'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Criptografar a senha
    $senha_cripto = password_hash($senha, PASSWORD_DEFAULT);

    // Protege contra SQL injection usando prepared statements
    $stmt = $conn->prepare("INSERT INTO enfermeiros (nome, coren, usuario, senha) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $coren, $usuario, $senha_cripto);

    if ($stmt->execute()) {
        echo "Enfermeiro cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar enfermeiro: " . $stmt->error;
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
    <title>Cadastro de Enfermeiro</title>
</head>
<body>
    <h2>Cadastro de Enfermeiro</h2>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        COREN: <input type="text" name="coren" required><br>
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" name="cadastrar_enfermeiro" value="Cadastrar Enfermeiro">
    </form>
</body>
</html>