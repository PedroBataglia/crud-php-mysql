<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\UserRepository;

class ListUserController implements Contrller
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function processaRequisicao(): void
    {
        $userList = $this->repository->all();

        require_once __DIR__ . '/../../../view/user/listar-usuarios.php';
    }
}
