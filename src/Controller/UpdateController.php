<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\RenderViewTrait;
use Alura\Cursos\Infra\EntityManagerCreator;

/**
 * Renderiza a view de editar
 * Class UpdateController
 * @package Alura\Cursos\Controller
 */
class UpdateController implements InterfaceControllerRequest
{

    use RenderViewTrait;
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