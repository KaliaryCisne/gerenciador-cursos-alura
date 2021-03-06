<?php


namespace LF\Courses\Controller;

use LF\Courses\Helper\RenderViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Gerencia os acessos a aplicação e renderiza a view de login
 * Class AuthenticationControler
 * @package LF\Courses\Controller
 */
class AuthenticationControler implements RequestHandlerInterface
{

    use RenderViewTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html =  $this->render('auth/login.php', [
            'title' => 'Log Into Course Manager',
        ]);

        return new Response(200, [], $html);
    }
}