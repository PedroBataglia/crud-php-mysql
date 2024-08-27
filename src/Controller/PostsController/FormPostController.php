<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\model\PostModel;
use Elaine\Mvc\Repository\PostsRepository;

class FormPostController implements Contrller
{
    public function __construct(private PostsRepository $postsRepository)
    {
    }

    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        /**@var PostModel $post */
        $post = null;
        if ($id !== false && $id !== null) {
            $post = $this->postsRepository->find($id);
        }

        require_once __DIR__ . '/../../../view/post/form-post.php';
    }
}
