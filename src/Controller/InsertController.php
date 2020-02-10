<?php


namespace Alura\Cursos\Controller;

/**
 * Chama a view para inserir um novo curso
 * Class InsertController
 * @package Alura\Cursos\Controller
 */
class InsertController extends RenderViewController implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        echo $this->render("courses/form.php", [
            'title' => "New course",
        ]);
    }
}