<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
</head>
<body>
<?php 
    include 'ConexaoSQL.php';

    $sql = "SELECT * FROM `turmas`";
    $comando = $conn->prepare($sql);
    $comando->execute();
?>

    <!-- Formulário para salvar alunos -->
    <form action="SalvarAluno.php">
        <label for="nomeAluno">Nome do Aluno: </label>
        <input type="text" name="nomeAluno" required>
        <select name="Turmas" required>
            <?php
                while($linha = $comando->fetch()){
                    echo "<option value='".$linha['id']."'>".$linha['nome']."</option>";
                }
            ?>
        </select>
        <input name="btnSalvaAluno" type="submit" value="Salvar Aluno">
    </form>
</body>
</html>