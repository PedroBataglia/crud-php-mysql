<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\PostsRepository;

class ListPostController implements Contrller
{
    private PostsRepository $postsRepository;

    public function __construct(PostsRepository $Repository)
    {
        $this->postsRepository = $Repository;
    }

    public function processaRequisicao(): void
    {
        $postList = $this->postsRepository->all();

        require_once __DIR__ . '/../../../view/post/listar-posts.php';
    }
}
