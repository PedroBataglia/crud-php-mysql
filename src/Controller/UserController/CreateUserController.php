<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\model\UserModel;
use Elaine\Mvc\Repository\UserRepository;

class CreateUserController implements Contrller
{

    public function __construct(private UserRepository $userRepository)
    {

    }

    public function processaRequisicao(): void
    {
        $name = filter_input(INPUT_POST, 'name');

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $password = filter_input(INPUT_POST, 'password');

        $user = new UserModel($name, $email, $password);
        $sucess = $this->userRepository->add($user);
        if ($sucess === false) {
            header('Location: /listar-usuarios?sucesso=0');
        } else {
            header('Location: /listar-usuarios?sucesso=1');
        }
    }
}
