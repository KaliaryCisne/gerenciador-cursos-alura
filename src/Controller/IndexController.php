<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexController implements InterfaceControllerRequest
{

    use RenderViewTrait;
    public function processRequest(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('courses/home.php', [
            'title' => 'Learn Easy',
        ]);

        return new Response(302, [], $html);
    }
}