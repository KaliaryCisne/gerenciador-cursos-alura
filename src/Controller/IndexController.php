<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Helper\RenderViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class IndexController implements RequestHandlerInterface
{

    use RenderViewTrait;
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html = $this->render('courses/home.php', [
            'title' => 'Learn Easy',
        ]);

        return new Response(302, [], $html);
    }
}