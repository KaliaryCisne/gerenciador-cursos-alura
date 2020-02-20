<?php


namespace LF\Courses\Controller;


use Doctrine\ORM\EntityManagerInterface;
use LF\Courses\{Entity\Curso, Helper\RenderViewTrait};
use Nyholm\Psr7\Response;
use Psr\Http\{Message\ResponseInterface, Message\ServerRequestInterface, Server\RequestHandlerInterface};

/**
 * Renderiza a view que lista todos os cursos
 * Class ListController
 * @package LF\Courses\Controller
 */
class ListController implements RequestHandlerInterface
{
    use RenderViewTrait;
    private $repositorioDeCursos;

    /**
     * ListController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
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