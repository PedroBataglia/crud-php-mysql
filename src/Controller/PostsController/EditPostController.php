<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\model\PostModel;
use Elaine\Mvc\Repository\PostsRepository;

class EditPostController implements Contrller
{
    public function __construct(private PostsRepository $postsRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === false || $id === null) {
            header('Location: /?sucess=0');
        }

        $titulo = filter_input(INPUT_POST, 'titulo');

        $conteudo = filter_input(INPUT_POST, 'conteudo');

        $tipo = filter_input(INPUT_POST, 'tipo');

        $descricao = filter_input(INPUT_POST,'descricao');

        $post = new PostModel($titulo, $conteudo, $tipo, $descricao, new \DateTime());
        $post->setId($id);
        $sucess = $this->postsRepository->edit($post);
        if ($sucess === false) {
            header('Location: /listar-posts?sucesso=0');
        } else {
            header('Location: /listar-posts?sucesso=1');
        }
    }
}
