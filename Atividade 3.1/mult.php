<!DOCTYPE html>
<html>
<head>
    <title>Calculadora Simples</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $pg_atual = 'resultado';
        include 'navbar.php';
    ?>

    <div class='container-fluid my-container-resultado'>
        <h1>Resultado:</h1>

    <?php
        $nums = array($_GET['num1'], $_GET['num2'], $_GET['num3']);
        function mult($nums){
            echo "$nums[0] * $nums[1] * $nums[2] = ", $nums[0] * $nums[1] * $nums[2];
        }

        $resultado = mult($nums);
        echo $resultado;
    ?>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>