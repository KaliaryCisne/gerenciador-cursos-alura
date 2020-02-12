<?php


namespace Alura\Cursos\Controller;


class LogoutController implements InterfaceControllerRequest
{

    public function processRequest(): void
    {
        session_destroy();
        header('Location: /login');
    }
}