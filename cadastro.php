<?php
include 'db.php'; // Inclui a conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $especialidade = $_POST['especialidade'];
    $crm = $_POST['crm'];
    $usuario = $_POST['usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha

    $sql = "INSERT INTO medicos (nome, especialidade, crm, usuario, senha) VALUES ('$nome', '$especialidade', '$crm', '$usuario', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Médico cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

    $conn->close(); // Fechar a conexão aqui
} else {
    echo "Método não suportado.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Médicos</title>
</head>
<body>
    <h2>Cadastro de Médicos</h2>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        Especialidade: <input type="text" name="especialidade" required><br>
        CRM: <input type="text" name="crm" required><br>
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>