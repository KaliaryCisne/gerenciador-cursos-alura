<?php


namespace Alura\Cursos\Controller;

use Alura\Cursos\Helper\RenderViewTrait;

/**
 * Chama a view para inserir um novo curso
 * Class InsertController
 * @package Alura\Cursos\Controller
 */
class InsertController implements InterfaceControllerRequest
{
    use RenderViewTrait;
    public function processRequest(): void
    {
        echo $this->render("courses/form.php", [
            'title' => "New course",
        ]);
    }
}