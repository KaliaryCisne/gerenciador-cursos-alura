<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderViewTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Chama a view para inserir um novo curso
 * Class InsertController
 * @package Alura\Cursos\Controller
 */
class InsertController implements RequestHandlerInterface
{
    use RenderViewTrait;

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html =  $this->render("courses/form.php", [
            'title' => "New course",
        ]);

        return new Response(200, [], $html);
    }
}