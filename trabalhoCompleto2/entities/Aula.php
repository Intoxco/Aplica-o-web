<?php


class Aula{
    private $turma;
    private $professor;
    private $idAula;
    private $materia;
    private $diaSemana;
    private $horarioInicio;
    private $horarioTermino;

    public function __construct($turma,$professor,$idAula,$materia,$diaSemana,$horarioInicio,$horarioTermino){
        $this->turma = $turma;
        $this->professor = $professor;
        $this->idAula = $idAula;
        $this->materia = $materia;
        $this->diaSemana = $diaSemana;
        $this->horarioInicio = $horarioInicio;
        $this->horarioTermino = $horarioTermino;
    }

    public function getProfessor(){
        return $this->turma;
    }
    public function setProfessor($professor){
        $this->professor  = $professor;
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
        return $this->turma;
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