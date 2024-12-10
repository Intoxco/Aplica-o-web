<?php
require "Usuario.php";
class Aluno extends Usuario{
    private $nome;
    private $dataNascimento;

    private $nomeResponsavel;
    private $turma;

    public function __construct($login,$senha,$idUsuario,$nomeResponsavel,$dataNascimento,$nome,$turma){
        $this->login = $login;
        $this->senha = $senha;
        $this->idUsuario = $idUsuario;
        $this->nome = $nome;
        $this->dataNascimento= $dataNascimento;
        $this->nomeResponsavel= $nomeResponsavel;
        $this->turma = $turma;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }
    public function setDataNascimento($dataNascimento){
        $this->dataNascimento = $dataNascimento;
    }
    public function getDataNascimento(){
        return $this->dataNascimento;
    }
    public function setNomeResponsavel($nomeResponsavel){
        $this->nomeResponsavel = $nomeResponsavel;
    }
    public function getNomeResponsavel(){
        return $this->nomeResponsavel;
    }
    public function setTurma($turma){
        $this->turma = $turma;
    }
    public function getTurma(){
        return $this->turma;
    }
}