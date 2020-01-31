<?php

use Alura\Cursos\Controller\Exclusion;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\IndexController;
use Alura\Cursos\Controller\listCourses;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\Update;

return [
    '/' => IndexController::class,
    '/index' => IndexController::class,
    '/list-courses' => listCourses::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusion::class,
    '/alterar-curso' => Update::class,
];

