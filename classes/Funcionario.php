<?php
    private class Funcionario
    {
        private $idfuncionario;
        private $cpf;
        private $senha;
        private $nome;
        private $email;
        private $matricula;
        private $dataNasc;
        public function __construct($idfuncionario,$cpf,$senha,$nome,$email,$matricula,$dataNasc)
        {
            $this->idfuncionario=$idfuncionario;
            $this->senha=$senha;
            $this->nome=$nome;
            $this->email=$email;
            $this->matricula=$matricula;
            $this->dataNasc=$dataNasc
        }
        public function getIdFuncionario()
        {
            return $this->idfuncionario;
        }
        public function setIdFuncionario($idfuncionario)
        {
            $this->idfuncionario = $idfuncionario;
        }
        public function getCpf()
        {
            return $this->cpf;
        }
        public function setCpf($cpf)
        {
            $this->cpf = $cpf;
        }
        public function getSenha()
        {
            return $this->senha;
        }
        public function setSenha($senha)
        {
            $this->senha = $senha;
        }
        public function getNome()
        {
            return $this->nome;
        }
        public function setNome($nome)
        {
            $this->nome = $nome;
        }
        public function getEmail()
        {
            return $this->email;
        }
        public function setEmail($email)
        {
            $this->email = $email;
        }
        public function getMatricula()
        {
            return $this->cpf;
        }
        public function setMatricula($cpf)
        {
            $this->cpf = $cpf;
        }
        public function getDataNasc()
        {
            return $this->dataNasc;
        }
        public function setDataNasc($dataNasc)
        {
            $this->dataNasc = $dataNasc;
        }
    }

    
?>