<?php

    include '../ConexaoSql.php';

    $comandoSql = 'SELECT `nomeTime`, `pontosTime` FROM `tblfutbol` ORDER BY `pontosTime` ASC';

    $comando = $conn->prepare($comandoSql);

    $resultado = $comando->execute();

    if($resultado){
        while($linha = $comando->fetch()){
            echo $linha['nomeTime'].'<br>';
            echo $linha['pontosTime'].'<br>';

        }
    }


?>