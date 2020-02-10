<?php

use Alura\Cursos\Controller\{AuthenticationControler,
    DeleteController,
    InsertController,
    IndexController,
    ListController,
    LoginController,
    PersistenceController,
    UpdateController};

return [
    '/' => IndexController::class,
    '/index' => IndexController::class,
    '/list-courses' => ListController::class,
    '/novo-curso' => InsertController::class,
    '/salvar-curso' => PersistenceController::class,
    '/excluir-curso' => DeleteController::class,
    '/alterar-curso' => UpdateController::class,
    '/login' => AuthenticationControler::class,
    '/logar' => LoginController::class,
];

