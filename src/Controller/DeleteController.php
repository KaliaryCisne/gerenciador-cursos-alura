<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\Entity\Curso;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Deleta um curso
 * Class DeleteController
 * @package Alura\Cursos\Controller
 */
class DeleteController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->cursoRepository = $this->entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-courses']);
        if (is_null($id) || $id === false) {
            $this->setMessage("danger", "Curso inexistente");
            return $response;
        }

        $curso = $this->cursoRepository->find($id);
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        $this->setMessage("success", "Curso excluído com sucesso!");
        return $response;
    }
}