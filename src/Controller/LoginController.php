<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Helper\FlashMessageTrait;
use Alura\Cursos\Infra\EntityManagerCreator;
use Nyholm\Psr7\Response;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

/**
 * Realizar o login caso o usuário tenha permissão para entrar no sistema
 * Class LoginController
 * @package Alura\Cursos\Controller
 */
class LoginController implements RequestHandlerInterface
{

    use FlashMessageTrait;
    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(Usuario::class);
    }

    public function handle(ServerRequestInterface $request): ResponseInterface
    {

        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        $redirectLogin = new Response(302, ['Location' => '/login']);
        if (is_null($email) || $email === false) {
            $this->setMessage("danger", "E-mail digitado não é um e-mail válido!");
            return $redirectLogin;
        }

        $password = filter_input(
            INPUT_POST,
            'password',
            FILTER_SANITIZE_STRING
        );

        /** @var Usuario $usuario */
        $usuario = $this->userRepository
        ->findOneBy(['email' => $email]);

        if(is_null($usuario) || !$usuario->verifyPassword($password)) {
            $this->setMessage("danger", "E-mail ou senha inválidos!");
            return $redirectLogin;
        }

        $_SESSION['logado'] = true;
        header('Location: /list-courses');
        return new \Nyholm\Psr7\Response(302, ['Location' => '/list-courses']);

    }
}