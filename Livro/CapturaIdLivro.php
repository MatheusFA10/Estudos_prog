<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
</head>
<body>
    
    <form action="CapturaIdLivro.php">
        <label for="idLivro">Digite Um ID</label>
        <input type="text" name="idLivro" >
        <input type="submit">
    </form><br>
    <form action="CapturaIdLivro.php">
        <input type="submit" name="mostrarTudo" value="Mostrar Todos os ID's">
    </form>
    <br>
    <?php
    include '../ConexaoSql.php';
    
        if(isset($_GET['mostrarTudo'])){

            $comandoSql = 'SELECT * FROM `tbllivro`';
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();

                if($resultado){
                    echo'
                            <table class="table" border="1">
                                <tr>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Idioma</th>
                                    <th>Nº Paginas</th>
                                    <th>Editora</th>
                                    <th>Data de Publicação</th>
                                    <th>ISBN</th>
                                    <th>Deletar</th>
                                </tr>
                    ';
                     while($linha = $comando->fetch()){
                        echo '  

                                        <tr>
                                            <td><p class="card-title">'.$linha['idLivro'].'</p></td>
                                            <td><p class="card-title">'.$linha['tituloLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['idiomaLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['qntPagLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['editoraLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['dataPubLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['isbnLivro'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Livro/DeletaIdLivro.php?idLivro='.$linha['idLivro'].'"> Deletar </a></td>
                                        <tr>
                                    
                            ';
                    }
                    echo '</table><br>';
                }
            }
            catch(Exception $e){ echo "Erro $e"; }
        }
    
        
        if(isset($_GET['idLivro'])){
            
            $comandoSql = 'SELECT * FROM `tbllivro` WHERE `idLivro` = '.$_GET['idLivro'];
            try{
                $comando = $conn->prepare($comandoSql);

                $resultado = $comando->execute();
                
                if($resultado){
                    while($linha = $comando->fetch()){
                        echo '  
                                    <table class="table" border="1">
                                        <tr>
                                            <th>ID</th>
                                            <th>Titulo</th>
                                            <th>Idioma</th>
                                            <th>Nº Paginas</th>
                                            <th>Editora</th>
                                            <th>Data de Publicação</th>
                                            <th>ISBN</th>
                                            <th>Deletar</th>
                                        </tr>
                                        <tr>
                                            <td><p class="card-title">'.$linha['idLivro'].'</p></td>
                                            <td><p class="card-title">'.$linha['tituloLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['idiomaLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['qntPagLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['editoraLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['dataPubLivro'].'</p></td>
                                            <td><p class="card-text">'.$linha['isbnLivro'].'</p></td>
                                            <td><a href="http://localhost/ATIVIDADES/Conteudo_08_10_24/Livro/DeletaIdLivro.php?idLivro='.$linha['idLivro'].'"> Deletar </a></td>
                                        <tr>
                                    </table>
                                ';
                    }
                }
            }catch(Exception $e){
                echo 'Digite um id Válido!';
            }
        }



    ?>
</body>
</html>