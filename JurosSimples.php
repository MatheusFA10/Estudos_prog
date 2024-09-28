<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cálculo de Juros Simples</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 300px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        .resultado {
            margin-top: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cálculo de Juros Simples</h1>
        <form id="jurosForm">
            <label for="capital">Capital (R$):</label>
            <input type="number" id="capital" required>
            
            <label for="taxa">Taxa de Juros (Exemplo 0.05)</label>
            <input type="number" step="0.01" id="taxa" required>
            
            <label for="tempo">Tempo (em anos):</label>
            <input type="number" id="tempo" required>
            
            <button type="submit">Calcular Juros</button>
        </form>

        <div id="resultado" class="resultado"></div>
    </div>

    <script>
        document.getElementById('jurosForm').addEventListener('submit', function(e) {
            e.preventDefault(); 
            
            const capital = parseFloat(document.getElementById('capital').value);
            const taxa = parseFloat(document.getElementById('taxa').value);
            const tempo = parseFloat(document.getElementById('tempo').value);

            
            const juros = capital * taxa * tempo;

            
            const resultadoDiv = document.getElementById('resultado');
            resultadoDiv.innerHTML = `juros Simples a serem pagos: <br> R$ ${juros.toFixed(2).replace('.', ',')}`;
        });
    </script>
</body>
</html>