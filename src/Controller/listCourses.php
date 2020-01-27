<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class listCourses implements InterfaceControllerRequest
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
        $cursos = $this->repositorioDeCursos->findAll();
        $titulo = "List of courses";
        require __DIR__ . '/../../view/courses/list-courses.php';
    }
}