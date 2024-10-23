<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    include 'ConexaoSQL.php';

    $sql = "SELECT * FROM `turmas`";

    $comando = $conn->prepare($sql);
    $resultado = $comando->execute();
?>
    <form action="FormCadastroNota.php">
        <label>Pesquise a Turma</label>
        <select name="turmas">
            <?php
                if($resultado){
                    while($linha = $comando->fetch()){
                        echo "<option value=".$linha['id'].">".$linha['nome']."</option>";
                    }
                }
            ?>
        </select>
        <input name="FormCadastroNota.php" type="submit" value="Ver Alunos Disponiveis">
    </form>
    <table border="1">
        <tr>
            <td>ID do Aluno</td>
            <td>Nome do Aluno</td>
        </tr>

        <?php

            if(isset($_GET['turmas'])){
                $idTurma = $_GET['turmas'];
                $sql = "SELECT * FROM `alunos` WHERE `id_turma` = $idTurma";

                $comando = $conn->prepare($sql);
                $resultado = $comando->execute();

                if($resultado){
                    while($linha = $comando->fetch()){
                        echo "<tr><td>".$linha['id']."</td>
                                  <td>".$linha['nome']."</td>
                                  <td><a href='http://localhost/ATIVIDADES/conteudo-22_10/InseriNotaAluno.php?idAluno=".$linha['id']."&idTurma=$idTurma'>Selecionar Aluno</a></td></tr>'";
                    }
                }
            }
        

        ?>
    </table>
</body>
</html>