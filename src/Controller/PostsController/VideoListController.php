<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\PostsRepository;

class VideoListController implements Contrller
{
    private PostsRepository $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }
    public function processaRequisicao(): void
    {
        if ($this->postsRepository->isAnUrl());
    }
}