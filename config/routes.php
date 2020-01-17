<?php

use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\IndexController;
use Alura\Cursos\Controller\listarCursos;
use Alura\Cursos\Controller\Persistencia;

return [
    '/' => IndexController::class,
    '/index' => IndexController::class,
    '/listar-cursos' => listarCursos::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
];

