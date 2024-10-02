<?php
    include_once 'aluno.php';
    session_start();
    

    if (isset($_SESSION['aluno'])) {
        $aluno = unserialize($_SESSION['aluno']);
    } else {
        echo "Nenhum aluno encontrado.";
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Mostrar</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $pg_atual = "mostra"; include "navbar.php"; ?>


    <div class='container-fluid my-container'>
        <div class="card" style="width: 18rem;">
            <h2>Nome do Aluno: </h2>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Nome:</strong> <?php echo htmlspecialchars($aluno->nome); ?></li>
                <li class="list-group-item"><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($aluno->nasc); ?></li>
                <li class="list-group-item"><strong>Email:</strong> <?php echo htmlspecialchars($aluno->email); ?></li>
                <li class="list-group-item"><strong>Curso:</strong> <?php echo htmlspecialchars($aluno->curso); ?></li>
            </ul>
        </div>
    </div>


    <br>
    <a class="my_a" href="mostra_idade.php">Idade</a>
    <br>
    <a class="my_a" href="sair.php">Sair</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
