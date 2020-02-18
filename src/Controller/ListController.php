<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderViewTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

/**
 * Renderiza a view que lista todos os cursos
 * Class ListController
 * @package Alura\Cursos\Controller
 */
class ListController implements InterfaceControllerRequest
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

    public function processRequest(): void
    {
        $courses = $this->repositorioDeCursos->findAll();
        echo $this->render("courses/list-courses.php", [
            'title' => "List of courses",
            'courses' => $courses,
        ]);
    }
}