<?php


namespace LF\Courses\Controller;


use Doctrine\ORM\EntityManagerInterface;
use LF\Courses\{Entity\Curso, Helper\RenderViewTrait, Infra\EntityManagerCreator};
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Renderiza a view de editar
 * Class UpdateController
 * @package LF\Courses\Controller
 */
class UpdateController implements RequestHandlerInterface
{

    use RenderViewTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $repositoryCursos;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->repositoryCursos = $entityManager->getRepository(Curso::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $id = filter_var(
            $request->getQueryParams()['id'],
            FILTER_VALIDATE_INT
        );

        $response = new Response(302, ['Location' => '/list-courses']);
        if(is_null($id) || $id === false) {
            return $response;
        }

        $curso = $this->repositoryCursos->find($id);

        $html = $this->render('courses/form.php', [
            'course' => $curso,
            'title' => "Editing form {$curso->getDescricao()}",
        ]);

        return new Response(200, [], $html);
    }
}