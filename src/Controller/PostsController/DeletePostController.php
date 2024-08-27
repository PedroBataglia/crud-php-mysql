<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\PostsRepository;

class DeletePostController implements Contrller
{
    public function __construct(private PostsRepository $postsRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        if ($id === null || $id === false) {
            header('Location: /?listar-posts');
        }

        $this->postsRepository->delete($id);
    }
}
