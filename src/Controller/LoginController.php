<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Entity\Usuario;
use Alura\Cursos\Infra\EntityManagerCreator;

/**
 * Realizar o login caso o usuário tenha permissão para entrar no sistema
 * Class LoginController
 * @package Alura\Cursos\Controller
 */
class LoginController implements InterfaceControllerRequest
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $userRepository;

    public function __construct()
    {
        $entityManager = (new EntityManagerCreator())->getEntityManager();
        $this->userRepository = $entityManager->getRepository(Usuario::class);
    }

    public function processRequest(): void
    {

        $email = filter_input(
            INPUT_POST,
            'email',
            FILTER_VALIDATE_EMAIL
        );

        if (is_null($email) || $email === false) {
            echo "o e-mail digitado não é um e-mail válido!";
            return;
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
            echo "E-mail ou senha inválidos!";
            return;
        }

        $_SESSION['logado'] = true;

        header('Location: /list-courses');

    }
}