<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserir Nota do Aluno</title>
</head>
<body>
    <?php
        include 'ConexaoSQL.php';

        // Verifica se os parâmetros idAluno e idTurma foram passados via GET
        if (isset($_GET['idAluno']) && isset($_GET['idTurma'])) {
            $idAluno = $_GET['idAluno'];
            $idTurma = $_GET['idTurma'];
        } else {
            echo "Parâmetros idAluno e idTurma não foram fornecidos!";
            exit; // Encerra o script caso os parâmetros estejam ausentes
        }
    ?>

    <!-- Formulário para salvar nota -->
    <form action="SalvarNota.php">
        <label for="notaAluno">Digite a nota do aluno:</label>
        <input name="notaAluno" type="text" required>
        <input name="idAluno" type="hidden" value="<?php echo $idAluno; ?>">
        <input name="idTurma" type="hidden" value="<?php echo $idTurma; ?>">
        <input name="btnSalvaNota" type="submit" value="Salvar a Nota">
    </form>

    <!-- Tabela para exibir as notas do aluno -->
    <table border="1">
        <tr>
            <td>Nota do Aluno</td>
        </tr>
        <?php 
            // Query para selecionar as notas do aluno
            $sql = "SELECT * FROM `notas` WHERE `id_aluno` = :idAluno";

            try {
                $comando = $conn->prepare($sql);
                $comando->execute([':idAluno' => $idAluno]);

                // Verifica se há resultados e exibe as notas
                while ($linha = $comando->fetch()) {
                    echo "<tr><td>".$linha['valor']."</td></tr>";
                }

            } catch (Exception $e) {
                echo "Erro ao buscar as notas: " . $e->getMessage();
            }
        ?>
    </table>
</body>
</html>