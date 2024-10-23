<?php
    include 'ConexaoSQL.php';

    if(isset($_GET['btnSalvaTurma'])){
        $turma = $_GET['nomeTurma'];
        $sql = "INSERT INTO `turmas` (`nome`) VALUES ('$turma')";

        $resultado = $conn->query($sql);  

        if($resultado){
            echo "Turma salva com sucesso!";
        } else {
            echo "Erro ao salvar turma!";
        }
    }
?>