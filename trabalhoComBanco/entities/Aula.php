<?php


class Aula{
    private $idTurma;
    private $idUsuario;
    private $idAula;
    private $materia;
    private $diaSemana;
    private $horarioInicio;
    private $horarioTermino;

    public function __construct($idTurma,$idUsuario,$idAula,$materia,$diaSemana,$horarioInicio,$horarioTermino){
        $this->idTurma = $idTurma;
        $this->idUsuario = $idUsuario;
        $this->idAula = $idAula;
        $this->materia = $materia;
        $this->diaSemana = $diaSemana;
        $this->horarioInicio = $horarioInicio;
        $this->horarioTermino = $horarioTermino;
    }
    public function getIdTurma(){
        return $this->idTurma;
    }
    public function setIdTurma($idTurma){
        $this->idTurma=$idTurma;
    }
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario  = $idUsuario;
    }
    public function getIdAula(){
        return $this->idAula;
    }
    public function setIdAula($idAula){
        $this->idAula  = $idAula;
    }
    public function getMateria(){
        return $this->materia;
    }
    public function setMateria($materia){
        $this->materia  = $materia;
    }
    public function getDiaSemana(){
        return $this->diaSemana;
    }
    public function setDiaSemana($diaSemana){
        $this->diaSemana  = $diaSemana;
    }
    public function getHorarioInicio(){
        return $this->horarioInicio;
    }
    public function setHorarioInicio($horarioInicio){
        $this->horarioInicio  = $horarioInicio;
    }
    public function getHorarioTermino(){
        return $this->horarioTermino;
    }
    public function setHorarioTermino($horarioTermino){
        $this->horarioTermino  = $horarioTermino;
    }
}