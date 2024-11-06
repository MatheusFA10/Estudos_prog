<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

// Função de login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Coletando os dados do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Protege contra SQL injection usando prepared statements
    $stmt = $conn->prepare("SELECT * FROM medicos WHERE usuario = ?");
    $stmt->bind_param("s", $usuario); // "s" significa string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifica a senha com password_verify
        if (password_verify($senha, $row['senha'])) {
            // Sessão iniciada e dados do médico armazenados
            $_SESSION['medico'] = $row['usuario']; // Armazena o usuário do médico na sessão
            $_SESSION['nome'] = $row['nome']; // Armazena o nome do médico, se necessário

            // Mensagem de sucesso
            echo "Login bem-sucedido! Bem-vindo, " . $_SESSION['nome'] . ".";

            // Redirecionar para a página do médico ou dashboard
            header("Location: dashboard.php"); // Exemplo de redirecionamento para a página do médico
            exit();
        } else {
            // Mensagem de erro na senha
            echo "Senha incorreta.";
        }
    } else {
        // Mensagem de erro no usuário
        echo "Usuário não encontrado.";
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
    <title>Login de Médico</title>
</head>
<body>
    <h2>Login de Médico</h2>
    <form method="POST">
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" name="login" value="Entrar">
    </form>
</body>
</html>