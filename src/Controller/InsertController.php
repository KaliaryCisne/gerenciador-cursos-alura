<?php


namespace LF\Courses\Controller;

use LF\Courses\Helper\RenderViewTrait;
use Doctrine\ORM\EntityManagerInterface;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Chama a view para inserir um novo curso
 * Class InsertController
 * @package LF\Courses\Controller
 */
class InsertController implements RequestHandlerInterface
{
    use RenderViewTrait;

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $html =  $this->render("courses/form.php", [
            'title' => "New course",
        ]);

        return new Response(200, [], $html);
    }
}