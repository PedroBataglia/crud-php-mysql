<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\Repository\UserRepository;

class UserLoginController implements Contrller
{
    private UserRepository $repository;

    public function __construct(UserRepository $userRepository)
    {
        $this->repository = $userRepository;
    }

    public function processaRequisicao(): void
    {
        $name = filter_input(INPUT_POST, 'name');

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $password = filter_input(INPUT_POST, 'password');

        $user = $this->repository->find($email);
        //$correctPassword = password_verify($password, $user->password ?? '');

        if ($password === $user->password) {
            header('Location: /listar-posts');
        } else {
            header('Location: /login?sucesso=0');
        }
    }
}
