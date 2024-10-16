<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
</head>
<body>
    
    <form action="CapturaIdTime.php">
        <label for="idTime">Digite Um ID</label>
        <input type="text" name="idTime" >
        <input type="submit">
    </form><br>
    <form action="CapturaIdTime.php">
        <input type="submit" name="mostrarTudo" value="Mostrar Todos os ID's">
    </form>
    <br>
    <?php
    include '../ConexaoSql.php';
    
        if(isset($_GET['mostrarTudo'])){

            $comandoSql = 'SELECT * FROM `tblfutbol`';
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();

                if($resultado){
                    echo'
                            <table class="table" border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Time</th>
                                    <th>Pontos do Time</th>
                                </tr>
                    ';
                     while($linha = $comando->fetch()){
                        echo '  
                                        <tr>
                                            <td><p class="card-title">'.$linha['idTime'].'</p></td>
                                            <td><p class="card-title">'.$linha['nomeTime'].'</p></td>
                                            <td><p class="card-text">'.$linha['pontosTime'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Futbol/DeletaIdTime.php?idTime='.$linha['idTime'].'"> Deletar </a></td>
                                        <tr>
                                    
                            ';
                    }
                    echo '</table><br>';
                }
            }
            catch(Exception $e){ echo "Erro $e"; }
        }
    
        
        if(isset($_GET['idTime'])){
            
            $comandoSql = 'SELECT * FROM `tblfutbol` WHERE `idTime` = '.$_GET['idTime'];
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();

                if($resultado){
                    echo'
                            <table class="table" border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Time</th>
                                    <th>Pontos do Time</th>
                                </tr>
                    ';
                     while($linha = $comando->fetch()){
                        echo '  
                                        <tr>
                                            <td><p class="card-title">'.$linha['idTime'].'</p></td>
                                            <td><p class="card-title">'.$linha['nomeTime'].'</p></td>
                                            <td><p class="card-text">'.$linha['pontosTime'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Futbol/DeletaIdTime.php?idTime='.$linha['idTime'].'"> Deletar </a></td>
                                        <tr>
                                    
                            ';
                    }
                    echo '</table><br>';
                }
            }
            catch(Exception $e){ echo "Erro $e"; }
        }



    ?>
</body>
</html>