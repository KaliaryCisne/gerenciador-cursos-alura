<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

/**
 * Deleta um curso
 * Class DeleteController
 * @package Alura\Cursos\Controller
 */
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
            $_SESSION['message'] = 'Curso inexistente';
            $_SESSION['type_message'] = "danger";
            header('Location: /list-courses');
            return;
        }

        //        $curso = $this->entityManager->getReference(Curso::class, $id);
        $curso = $this->cursoRepository->find($id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        $_SESSION['message'] = 'Curso excluído com sucesso!';
        $_SESSION['type_message'] = "danger";
        header('Location: list-courses');
    }
}