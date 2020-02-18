<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderViewTrait;

/**
 * Gerencia os acessos a aplicação e renderiza a view de login
 * Class AuthenticationControler
 * @package Alura\Cursos\Controller
 */
class AuthenticationControler implements InterfaceControllerRequest
{

    use RenderViewTrait;
    public function processRequest(): void
    {
        echo $this->render('auth/login.php', [
            'title' => 'Log Into Course Manager',
        ]);
    }
}