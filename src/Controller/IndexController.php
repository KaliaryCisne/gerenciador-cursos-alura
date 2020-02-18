<?php


namespace Alura\Cursos\Controller;


class IndexController implements InterfaceControllerRequest
{

    public function processRequest(): void
    {
        $title = "Learn Easy";
        require __DIR__ . '/../../view/courses/home.php';
    }
}