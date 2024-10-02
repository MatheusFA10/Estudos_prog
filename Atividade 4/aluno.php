<?php
    class Aluno {
        public $nome, $nasc, $email, $curso;

    
        public function __construct($nome, $nasc, $email, $curso) {
            $this->nome = $nome;
            $this->nasc = $nasc;
            $this->email = $email;
            $this->curso = $curso;
        }

    
        public function idade() {
            $recente = new DateTime();
            $dataNasc = new DateTime($this->nasc);
            $idade = $recente->diff($dataNasc);
            return $idade->y; 
        }
    }
?>