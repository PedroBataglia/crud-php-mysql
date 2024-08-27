<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\UserRepository;

class FormUserController implements Contrller
{

    public function __construct(private UserRepository $userRepository)
    {

    }
    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $user = null;
        if ($id !== false && $id !== null) {
            $user = $this->userRepository->findId($id);
        }

        require_once __DIR__ . '/../../../view/user/form-user.php';
    }
}