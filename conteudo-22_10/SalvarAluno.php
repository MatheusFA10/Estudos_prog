<?php
    include 'ConexaoSQL.php';

    if(isset($_GET['btnSalvaAluno'])){
        $nomeAluno = $_GET['nomeAluno'];
        $idTurma = $_GET['Turmas'];

        $sql = "INSERT INTO `alunos` (`nome`, `id_turma`) VALUES ('$nomeAluno', '$idTurma');";

        $resultado = $conn->query($sql);  

        if($resultado){
            echo "Aluno salvo com sucesso!";
        } else {
            echo "Erro ao salvar aluno!";
        }
    }
?>
