<?php

namespace Elaine\Mvc\Controller\PostsController;

use Elaine\Mvc\Controller\Contrller;

class Error404Controller implements Contrller
{

    public function processaRequisicao(): void
    {
        http_response_code(404);
    }
}
