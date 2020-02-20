<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Gerencia os acessos a aplicação e renderiza a view de login
 * Class AuthenticationControler
 * @package Alura\Cursos\Controller
 */
class AuthenticationControler implements InterfaceControllerRequest
{

    use RenderViewTrait;
    public function processRequest(ServerRequestInterface $request): ResponseInterface
    {
        $html =  $this->render('auth/login.php', [
            'title' => 'Log Into Course Manager',
        ]);

        return new Response(200, [], $html);
    }
}