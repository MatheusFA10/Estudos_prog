<?php
session_start();
include 'db.php'; // Inclui a conexão com o banco de dados

// Variáveis para manter os valores digitados, caso o formulário seja reaberto após erro
$id_paciente = $nome_medicamento = $data_administracao = $hora_administracao = $dose = '';

// Função para cadastrar a receita
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cadastrar_receita'])) {
    // Coletando os dados do formulário
    $id_paciente = $_POST['id_paciente'];
    $nome_medicamento = $_POST['nome_medicamento'];
    $data_administracao = $_POST['data_administracao'];
    $hora_administracao = $_POST['hora_administracao'];
    $dose = $_POST['dose'];

    // Protege contra SQL injection usando prepared statements
    $stmt = $conn->prepare("INSERT INTO receitas (id_paciente, nome_medicamento, data_administracao, hora_administracao, dose) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $id_paciente, $nome_medicamento, $data_administracao, $hora_administracao, $dose);

    if ($stmt->execute()) {
        echo "Receita cadastrada com sucesso!";
        // Limpar os dados após o sucesso
        $id_paciente = $nome_medicamento = $data_administracao = $hora_administracao = $dose = '';
    } else {
        echo "Erro ao cadastrar receita: " . $stmt->error;
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
    <title>Cadastro de Receita Médica</title>
</head>
<body>
    <h2>Cadastro de Receita Médica</h2>
    <form method="POST">
        Nome do Paciente: 
        <select name="id_paciente" required>
            <?php
            // Obtendo a lista de pacientes cadastrados
            $stmt = $conn->prepare("SELECT id, nome FROM pacientes");
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                // Marcar como selecionado o paciente que foi escolhido
                echo "<option value='" . $row['id'] . "'" . ($row['id'] == $id_paciente ? ' selected' : '') . ">" . $row['nome'] . "</option>";
            }
            ?>
        </select><br>
        Nome do Medicamento: <input type="text" name="nome_medicamento" value="<?php echo htmlspecialchars($nome_medicamento); ?>" required><br>
        Data da Administração: <input type="date" name="data_administracao" value="<?php echo htmlspecialchars($data_administracao); ?>" required><br>
        Hora da Administração: <input type="time" name="hora_administracao" value="<?php echo htmlspecialchars($hora_administracao); ?>" required><br>
        Dose: <input type="text" name="dose" value="<?php echo htmlspecialchars($dose); ?>" required><br>
        <input type="submit" name="cadastrar_receita" value="Cadastrar Receita">
    </form>
</body>
</html>