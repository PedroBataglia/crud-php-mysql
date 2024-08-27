<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;

class LoginFormController implements Contrller
{

    public function processaRequisicao(): void
    {
        require_once __DIR__ . '/../../../view/login-form.php';
    }
}
