<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Infra\EntityManagerCreator;

class UpdateController extends RenderViewController implements InterfaceControllerRequest
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositoryCursos;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->repositoryCursos = $entityManager->getRepository(Curso::class);
    }

    public function processRequest(): void
    {
        $id = filter_input(
          INPUT_GET,
          'id',
          FILTER_VALIDATE_INT
        );

        if(is_null($id) || $id === false) {
            header('Location: /list-courses');
            return;
        }

        $curso = $this->repositoryCursos->find($id);
        echo $this->render('courses/form.php', [
            'course' => $curso,
            'title' => "Editing form {$curso->getDescricao()}",
        ]);

    }
}