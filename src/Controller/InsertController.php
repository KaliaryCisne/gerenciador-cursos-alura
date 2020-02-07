<?php


namespace Alura\Cursos\Controller;


class InsertController extends RenderViewController implements InterfaceControllerRequest
{
    public function processRequest(): void
    {
        echo $this->render("courses/form.php", [
            'title' => "New course",
        ]);
    }
}