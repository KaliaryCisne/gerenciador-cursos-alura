<?php

use Alura\Cursos\Controller\{DeleteController, InsertController, IndexController, ListController, PersistenceController, UpdateController};

return [
    '/' => IndexController::class,
    '/index' => IndexController::class,
    '/list-courses' => ListController::class,
    '/novo-curso' => InsertController::class,
    '/salvar-curso' => PersistenceController::class,
    '/excluir-curso' => DeleteController::class,
    '/alterar-curso' => UpdateController::class,
];

