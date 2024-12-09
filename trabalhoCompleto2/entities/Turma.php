<?php

class Turma{
    private $ano;
    private $idTurma;
    private $periodo;
    public function __construct($ano,$idTurma,$periodo){
        $this->ano  = $ano;
        $this->idTurma = $idTurma;
        $this->periodo = $periodo;
    }
    
    public function setAno($ano){
        $this->ano = $ano;
    }
    public function getAno()    {
        return $this->ano;
    }
    public function setIdTurma($idTurma){
        $this->idTurma = $idTurma;
    }
    public function getPeriodo(){
        return $this->periodo;
    }
    public function setPeriodo($periodo){
        $this->periodo = $periodo;
    }
}