<?php


namespace Alura\Cursos\Controller;


class FormularioInsercao implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        $titulo = "Novo curso";
        require __DIR__ . '/../../view/courses/formulario.php';
    }
}