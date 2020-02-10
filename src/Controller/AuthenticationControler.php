<?php


namespace Alura\Cursos\Controller;

/**
 * Gerencia os acessos a aplicação
 * Class AuthenticationControler
 * @package Alura\Cursos\Controller
 */
class AuthenticationControler extends RenderViewController implements InterfaceControllerRequest
{

    public function processRequest(): void
    {
        echo $this->render('auth/login.php', [
            'title' => 'Log Into Course Manager',
        ]);
    }
}