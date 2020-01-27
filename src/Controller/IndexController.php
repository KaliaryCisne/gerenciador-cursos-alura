<?php


namespace Alura\Cursos\Controller;


class IndexController implements InterfaceControllerRequest
{

    public function processRequest(): void
    {
        $titulo = "Cursos Alura";
        require __DIR__ . '/../../view/courses/home.php';
    }
}