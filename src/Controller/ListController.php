<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class ListController extends RenderViewController implements InterfaceControllerRequest
{
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