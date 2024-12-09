<?php
abstract class Usuario{
    protected $login;
    protected $senha;
    protected $idUsuario;

    public function getLogin (){
        return $this->login;
    }  
    public function setLogin($login){
        $this->login  = $login;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
}