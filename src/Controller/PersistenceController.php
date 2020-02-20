<?php


namespace Alura\Cursos\Controller;


use Alura\Cursos\{Entity\Curso, Helper\FlashMessageTrait, Helper\RenderViewTrait, Infra\EntityManagerCreator};
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Persiste um registro no banco
 * Class PersistenceController
 * @package Alura\Cursos\Controller
 */
class PersistenceController implements InterfaceControllerRequest
{

    use FlashMessageTrait, RenderViewTrait;
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $entityManager;

    public function __construct()
    {
        $this->entityManager = (new EntityManagerCreator())
            ->getEntityManager();
    }

    public function processRequest(ServerRequestInterface $request): ResponseInterface
    {
        //validates the data received
        $descricao = filter_input(
            INPUT_POST,
            'descricao',
            FILTER_SANITIZE_STRING
        );


        $curso = new Curso();
        $curso->setDescricao($descricao);

        $id = filter_input(
            INPUT_GET,
            'id',
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