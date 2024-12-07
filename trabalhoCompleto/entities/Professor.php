<?php
require "Usuario.php";

class Professor extends Usuario{
    private $nome;
    private $dataNascimento;
    private $idUsuario;
    private $login;
    private $senha;

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
        $this->nome = $dataNascimento;
    }public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setLogin($login){
        $this->nome = $login;
    }public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->nome = $senha;
    }
}