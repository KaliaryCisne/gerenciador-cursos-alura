<?php


namespace LF\Courses\Controller;


use Doctrine\ORM\EntityManagerInterface;
use LF\Courses\{Entity\Curso, Helper\FlashMessageTrait, Helper\RenderViewTrait, Infra\EntityManagerCreator};
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Persiste um registro no banco
 * Class PersistenceController
 * @package LF\Courses\Controller
 */
class PersistenceController implements RequestHandlerInterface
{

    use FlashMessageTrait, RenderViewTrait;

    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //validates the data received
        $descricao = filter_var(
            $request->getParsedBody()['descricao'],
            FILTER_SANITIZE_STRING
        );


        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        //Edita ou insere um curso
        if(!is_null($id) && $id !== false) {
            $curso->setId($id);
            $this->entityManager->merge($curso);
            $message = "Curso atualizado com sucesso!";
        } else {
            $this->entityManager->persist($curso);
            $message = "Curso inserido com sucesso!";
        }
        $this->setMessage("success", $message);
        $this->entityManager->flush();

        return new Response(302, ['Location' => '/list-courses']);
    }
}