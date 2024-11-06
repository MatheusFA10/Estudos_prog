<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar_paciente'])) {
    // Coletando os dados do formulário
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    // Protege contra SQL injection usando prepared statements
    $stmt = $conn->prepare("INSERT INTO pacientes (nome, cpf, data_nascimento, telefone, email, endereco) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $cpf, $data_nascimento, $telefone, $email, $endereco);

    if ($stmt->execute()) {
        echo "Paciente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar paciente: " . $stmt->error;
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
    <title>Cadastro de Paciente</title>
</head>
<body>
    <h2>Cadastro de Paciente</h2>
    <form method="POST">
        Nome: <input type="text" name="nome" required><br>
        CPF: <input type="text" name="cpf" required><br>
        Data de Nascimento: <input type="date" name="data_nascimento" required><br>
        Telefone: <input type="text" name="telefone"><br>
        E-mail: <input type="email" name="email"><br>
        Endereço: <textarea name="endereco"></textarea><br>
        <input type="submit" name="cadastrar_paciente" value="Cadastrar Paciente">
    </form>
</body>
</html>