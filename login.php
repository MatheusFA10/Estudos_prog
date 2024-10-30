<?php
session_start();
include 'db.php'; // Inclui a conexão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM medicos WHERE usuario = '$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['medico'] = $row['usuario'];
            echo "Login bem-sucedido! Bem-vindo, " . $row['nome'];
            // Aqui você pode redirecionar para outra página
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
}

$conn->close(); // Fechar a conexão aqui
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login de Médicos</title>
</head>
<body>
    <h2>Login de Médicos</h2>
    <form method="POST">
        Usuário: <input type="text" name="usuario" required><br>
        Senha: <input type="password" name="senha" required><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>
