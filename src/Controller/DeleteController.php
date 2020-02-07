<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class DeleteController implements InterfaceControllerRequest
{
    private $repository;
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->cursoRepository = $this->entityManager->getRepository(Curso::class);
    }

    public function processRequest(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /list-courses');
            return;
        }

        //        $curso = $this->entityManager->getReference(Curso::class, $id);
        $curso = $this->cursoRepository->find($id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        header('Location: list-courses');
    }
}