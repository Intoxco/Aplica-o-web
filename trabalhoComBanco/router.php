<?php
require_once 'vendor/autoload.php';


use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(['prefix' => 'admin'], function() {
    Router::get('/aluno', function() {
        require 'controllers/cadastroAluno.controller.php';
    });

    Router::post('/aluno', function() {
        require 'controllers/cadastroAluno.controller.php';
    });

    Router::get('/professor', function() {
        require 'controllers/cadastroProfessor.controller.php';
    });

    Router::post('/professor', function() {
        require 'controllers/cadastroProfessor.controller.php';
    });

    Router::get('/horario', function() {
        require 'controllers/cadastroHorario.controller.php';
    });

    Router::post('/horario', function() {
        require 'controllers/cadastroHorario.controller.php';
    });

});

Router::group(['prefix' => ''], function() {
    Router::get('/', function() {
        require 'controllers/login.controller.php';
    });

    Router::post('/', function() {
        require 'controllers/login.controller.php';
    });
});

Router::group(['prefix' => ''], function() {
    Router::get('/professor', function() {
        require 'controllers/professor.controller.php';
    });

    Router::post('/professor', function() {
        require 'controllers/professor.controller.php';
    });
});

Router::group(['prefix' => 'aluno'], function() {
    Router::get('/boletim', function() {
        require 'controllers/alunoBoletim.controller.php';
    });

    Router::post('/boletim', function() {
        require 'controllers/alunoBoletim.controller.php';
    });

    Router::get('/horario', function() {
        require 'controllers/alunoTabela.controller.php';
    });

    Router::post('/horario', function() {
        require 'controllers/alunoTabela.controller.php';
    });
});



Router::start();

