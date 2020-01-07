<?php

require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\listarCursos;
use Alura\Cursos\Controller\Persistencia;

switch ($_SERVER['REQUEST_URI']) {
    case '/listar-cursos':
        $controlador = new listarCursos();
        $controlador->processaRequisicao();
        break;
    case '/novo-curso':
        $controlador = new FormularioInsercao();
        $controlador->processaRequisicao();
        break;
    case '/salvar-curso':
        $controlador = new Persistencia();
        $controlador->processaRequisicao();
        break;
    default:
        echo "Erro 404";
        break;
}
