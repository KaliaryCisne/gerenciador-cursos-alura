<?php

use Alura\Cursos\Controller\{Exclusion, FormularioInsercao, IndexController, listCourses, Persistencia, Update};

return [
    '/' => IndexController::class,
    '/index' => IndexController::class,
    '/list-courses' => listCourses::class,
    '/novo-curso' => FormularioInsercao::class,
    '/salvar-curso' => Persistencia::class,
    '/excluir-curso' => Exclusion::class,
    '/alterar-curso' => Update::class,
];

