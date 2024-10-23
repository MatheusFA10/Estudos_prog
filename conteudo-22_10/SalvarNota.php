<?php
    include 'ConexaoSQL.php';

    if(isset($_GET['btnSalvaNota'])){
        $nota = $_GET['notaAluno'];

        if($nota > 10 || $nota < 0){
            echo "Nota inválida! Insira uma nota correta.";
        } else {
            $idAluno = $_GET['idAluno'];
            $idTurma = $_GET['idTurma'];

            $sql = "INSERT INTO `notas` (`valor`, `id_aluno`, `id_turma`) VALUES ('$nota', '$idAluno', '$idTurma');";

            $resultado = $conn->query($sql);  

            if($resultado){
                echo "Nota salva com sucesso!";
            } else {
                echo "Erro ao salvar nota!";
            }
        }
    }
?>