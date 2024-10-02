<?php
    include_once 'aluno.php';
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Formulário</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php $pg_atual = "formulario"; include "navbar.php";?>

    
    <div class='container-fluid my-container'>
        <h1>Sessão do Aluno</h1>
        
        <form method="get" action="recebe.php">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" id="nome" name="nome" required class="form-control-sm">
            </div>
            

            <div class="mb-3">
                <label class="my_lb" for="nascimento" class="form-label">Nascimento:</label>
                <input type="date" id="nasc" name="nasc" required class="form-control-sm">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" id="email" name="email" required class="form-control-sm">
            </div>

            <div class="mb-3">
                <label for="curso" class="form-label">Curso:</label>
                <input type="text" id="curso" name="curso" required class="form-control-sm">
            </div>
            

            <input type="submit" value="Mostrar" class="btn btn-primary">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
