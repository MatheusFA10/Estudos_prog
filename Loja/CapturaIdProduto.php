<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
</head>
<body>
    
    <form action="CapturaIdProduto.php">
        <label for="idProduto">Digite Um ID</label>
        <input type="text" name="idProduto" >
        <input type="submit">
    </form><br>
    <form action="CapturaIdProduto.php">
        <input type="submit" name="mostrarTudo" value="Mostrar Todos os ID's">
    </form>
    <br>
    <?php
    include '../ConexaoSql.php';
    
        if(isset($_GET['mostrarTudo'])){

            $comandoSql = 'SELECT * FROM `tblproduto`';
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();

                if($resultado){
                    echo'
                            <table class="table" border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Produto</th>
                                    <th>URL do produto</th><br>
                                    <th>Descrição do Produto</th>
                                    <th>Preço do Produto</th>
                                </tr>
                    ';
                     while($linha = $comando->fetch()){
                        echo '  
                                        <tr>
                                            <td><p class="card-title">'.$linha['idProduto'].'</p></td>
                                            <td><p class="card-title">'.$linha['nomeProduto'].'</p></td>
                                            <td><img src="'.$linha['urlProduto'].'"></td>
                                            <td><p class="card-text">'.$linha['descricaoProduto'].'</p></td>
                                            <td><p class="card-text">'.$linha['precoProduto'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Loja/DeletaIdProduto.php?idProduto='.$linha['idProduto'].'"> Deletar </a></td>
                                        <tr>
                                    
                            ';
                    }
                    echo '</table><br>';
                }
            }
            catch(Exception $e){ echo "Erro $e"; }
        }
    
        
        if(isset($_GET['idProduto'])){
            
            $comandoSql = 'SELECT * FROM `tblproduto` WHERE `idProduto` = '.$_GET['idProduto'];
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();

                if($resultado){
                    echo'
                            <table class="table" border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome do Produto</th>
                                    <th>URL do produto</th><br>
                                    <th>Descrição do Produto</th>
                                    <th>Preço do Produto</th>
                                </tr>
                    ';
                     while($linha = $comando->fetch()){
                        echo '  
                                        <tr>
                                            <td><p class="card-title">'.$linha['idProduto'].'</p></td>
                                            <td><p class="card-title">'.$linha['nomeProduto'].'</p></td>
                                            <td><img src="'.$linha['urlProduto'].'"></td>
                                            <td><p class="card-text">'.$linha['descricaoProduto'].'</p></td>
                                            <td><p class="card-text"> R$ '.$linha['precoProduto'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Loja/DeletaIdProduto.php?idProduto='.$linha['idProduto'].'"> Deletar </a></td>
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