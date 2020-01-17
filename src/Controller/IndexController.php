<?php


namespace Alura\Cursos\Controller;


class IndexController implements InterfaceControllerRequest
{

    public function processaRequisicao(): void
    {
        $titulo = "Cursos Alura";
        require __DIR__ . '/../../view/cursos/home.php';
    }
}