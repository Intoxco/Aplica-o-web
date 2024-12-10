<?php


class Boletim{

    private $idBoletim;
    private $idMateria;

    private $idUsuario;

    private $nota;


    public function __construct($idBoletim, $idMateria, $idUsuario, $nota) {
        $this->idBoletim = $idBoletim;
        $this->idMateria = $idMateria;
        $this->idUsuario = $idUsuario;
        $this->nota = $nota;
    }




}