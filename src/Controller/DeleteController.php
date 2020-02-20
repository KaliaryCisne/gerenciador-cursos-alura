<?php


namespace LF\Courses\Controller;


use Doctrine\ORM\EntityManagerInterface;
use LF\Courses\Entity\Curso;
use LF\Courses\Helper\FlashMessageTrait;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Deleta um curso
 * Class DeleteController
 * @property \Doctrine\Common\Persistence\ObjectRepository $cursoRepository
 * @package LF\Courses\Controller
 */
class DeleteController implements RequestHandlerInterface
{
    use FlashMessageTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;
    private $cursoRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->cursoRepository = $entityManager
            ->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-courses']);
        if (is_null($id) || $id === false) {
            $this->setMessage("danger", "Curso inexistente");
            return $response;
        }

        $curso = $this->cursoRepository->find($id);
//        var_dump($curso);
//        die();
        $this->entityManager->remove($curso);
        $this->entityManager->flush();
        $this->setMessage("success", "Curso excluído com sucesso!");
        return $response;
    }
}