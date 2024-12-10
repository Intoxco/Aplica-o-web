<?php
require "Usuario.php";

class Professor extends Usuario{
    private $nome;
    private $dataNascimento;

    public function __construct($nome,$dataNascimento,$idUsuario,$login,$senha){
        $this->nome = $nome;
        $this->dataNascimento = $dataNascimento;
        $this->idUsuario = $idUsuario;
        $this->login = $login;
        $this->senha = $senha;
    }
    
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }
}