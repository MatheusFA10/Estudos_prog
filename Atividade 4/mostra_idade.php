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
    <title>Idade Aluno</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <style> a.my_a {margin-left: 550px; text-decoration: none;} </style>
</head>
<body>
    <?php $pg_atual = "mostra_idade"; include "navbar.php";?>


    <div class='container-fluid my-container'>
        <h1>Idade do Aluno:</h1>
        <p>
            <?php echo htmlspecialchars($aluno->nome) . ", "; echo $aluno->idade(); ?>
        </p>
    </div>

    
    <br>
    <a class="my_a" href="sair.php">Sair</a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
