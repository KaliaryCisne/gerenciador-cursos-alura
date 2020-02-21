<?php

use LF\Courses\Controller\{AuthenticationControler,
    DeleteController,
    InsertController,
    IndexController,
    ListController,
    LoginController,
    LogoutController,
    PersistenceController,
    UpdateController};
use LF\Courses\Controller\api\CoursesApi;

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
    '/logout' => LogoutController::class,
    '/api/list-courses' => CoursesApi::class,
];

