<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

// Verificar se o nome do paciente foi informado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verificar_paciente'])) {
    $nome_paciente = $_POST['nome_paciente'];

    // Verificar se o paciente já está cadastrado no banco de dados
    $stmt = $conn->prepare("SELECT id, nome FROM pacientes WHERE nome LIKE ?");
    $nome_paciente_like = "%" . $nome_paciente . "%"; // Busca por nome similar
    $stmt->bind_param("s", $nome_paciente_like);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Paciente encontrado, exibir formulário de cadastro da receita médica
        echo "<h2>Paciente encontrado. Cadastro de Receita Médica</h2>";
        echo "<form method='POST' action='CadastroReceita.php'>";
        echo "Selecione o Paciente: <select name='id_paciente' required>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nome'] . "</option>";
        }
        echo "</select><br>";
        echo "Nome do Medicamento: <input type='text' name='nome_medicamento' required><br>";
        echo "Data da Administração: <input type='date' name='data_administracao' required><br>";
        echo "Hora da Administração: <input type='time' name='hora_administracao' required><br>";
        echo "Dose: <input type='text' name='dose' required><br>";
        echo "<input type='submit' value='Cadastrar Receita Médica'>";
        echo "</form>";
    } else {
        // Paciente não encontrado, redirecionar para o cadastro de paciente
        echo "<p>Paciente não encontrado. <a href='CadastroPaciente.php'>Clique aqui</a> para cadastrar o paciente.</p>";
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
    <title>Cadastro de Receita ou Paciente</title>
</head>
<body>
    <h2>Verificar Paciente</h2>
    <form method="POST">
        Nome do Paciente: <input type="text" name="nome_paciente" required><br>
        <input type="submit" name="verificar_paciente" value="Verificar Paciente">
    </form>
</body>
</html> 