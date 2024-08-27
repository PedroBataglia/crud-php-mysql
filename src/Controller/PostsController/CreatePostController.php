<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\model\PostModel;
use Elaine\Mvc\Repository\PostsRepository;

class CreatePostController implements Contrller
{
    public function __construct(private PostsRepository $postsRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $titulo = filter_input(INPUT_POST, 'titulo');
        if ($titulo === false) {
            header('Location: /?sucesso=0');
        }

        $conteudo = filter_input(INPUT_POST, 'conteudo');
        if ($conteudo === false)
            header('Location: /?sucesso=0');

        $tipo = filter_input(INPUT_POST, 'tipo');
        if ($tipo === false) {
            header('Location: /?sucesso=0');
        }

        $descricao = filter_input(INPUT_POST, 'descricao');
        if ($descricao === false) {
            header('Location: /?sucesso=0');
        }
        $timezone = new \DateTimeZone('America/Sao_Paulo');
        $dateTime = new \DateTime('now', $timezone);

        $post = new PostModel($titulo, $conteudo, $tipo, $descricao, $dateTime);
        $sucesso = $this->postsRepository->add($post);
        if($sucesso === false) {
            header('Location: /listar-posts?sucesso=0');
        } else {
            header('Location: /listar-posts?sucesso=1');
        }
    }
}
