<?php

namespace Elaine\Mvc\Controller;

class HomeBlogController implements Contrller
{


    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../view/pagina-inicial.php';
    }
}
