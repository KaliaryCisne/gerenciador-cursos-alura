<?php


namespace Alura\Cursos\Helper;


trait FlashMessageTrait
{
    public function setMessage(string $type, string $message): void
    {
        $_SESSION['message'] = $message;
        $_SESSION['type_message'] = $type;
    }
}