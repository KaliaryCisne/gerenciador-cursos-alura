<?php


namespace Alura\Cursos\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Garante que as classes que a implementarem terão um método de processar as requisições
 * Interface InterfaceControllerRequest
 * @package Alura\Cursos\Controller
 */
interface InterfaceControllerRequest
{
    public function processRequest(ServerRequestInterface $request): ResponseInterface;
}