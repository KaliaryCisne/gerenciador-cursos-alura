<?php


namespace LF\Courses\Helper;

/**
 * Retorna o html da view que será exibida
 * Trait RenderViewTrait
 * @package LF\Courses\Helper
 */
trait RenderViewTrait
{
    /**
     * @param string $pathView
     * @param array $data
     * @return string
     */
    public function render(string $pathView, array $data): string
    {

        // recebe um array associativo e define variáveis para cada chave
        extract($data);

        //ativa o armazenamento no buffer de saída
        ob_start();
        require __DIR__ . '/../../view/' . $pathView;

        //busca os dados que estão nesse buffer e depois o limpa
        return ob_get_clean();

    }
}