<?php


namespace Alura\Cursos\Controller;

/**
 * Garante que as classes que a implementarem terão um método de processar as requisições
 * Interface InterfaceControllerRequest
 * @package Alura\Cursos\Controller
 */
interface InterfaceControllerRequest
{
    public function processRequest(): void;
}