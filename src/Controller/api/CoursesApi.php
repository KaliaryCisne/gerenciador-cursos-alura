<?php

namespace LF\Courses\Controller\api;

use Doctrine\ORM\EntityManagerInterface;
use LF\Courses\Entity\Curso;
use Psr\Http\{Message\ResponseInterface, Message\ServerRequestInterface, Server\RequestHandlerInterface};
use Nyholm\Psr7\Response;

class CoursesApi implements RequestHandlerInterface
{

    /**
     * @var \Doctrine\Common\Persistence\ObjectRepository
     */
    private $courseRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->courseRepository = $entityManager->getRepository(Curso::class);
    }

    /**
     * @inheritDoc
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $courses = $this->courseRepository->findAll();
        return new Response(
            200,
            [
                'Content-Type' => 'application/json',
            ],
            json_encode($courses));

    }
}