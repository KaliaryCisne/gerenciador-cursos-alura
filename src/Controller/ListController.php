<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderViewTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Renderiza a view que lista todos os cursos
 * Class ListController
 * @package Alura\Cursos\Controller
 */
class ListController implements RequestHandlerInterface
{
    use RenderViewTrait;
    private $repositorioDeCursos;
    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())
            ->getEntityManager();
        $this->repositorioDeCursos = $entityManager
            ->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->repositorioDeCursos->findAll();
        $html =  $this->render("courses/list-courses.php", [
            'title' => "List of courses",
            'courses' => $courses,
        ]);

        return new Response(200, [], $html);
    }
}