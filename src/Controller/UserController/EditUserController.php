<?php

namespace Elaine\Mvc\Controller\UserController;

use Elaine\Mvc\Controller\Contrller;
use Elaine\Mvc\model\UserModel;
use Elaine\Mvc\Repository\UserRepository;

class EditUserController implements Contrller
{
    public function __construct(private UserRepository $userRepository)
{
    
}
    public function processaRequisicao(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        $name = filter_input(INPUT_POST, 'name');

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $password = filter_input(INPUT_POST, 'password');

        $user = new UserModel($name, $email, $password);
        $user->setId($id);
        $sucess = $this->userRepository->edit($user);
        if ($sucess === false) {
            header('Location: /usuarios/listar-usuarios?sucesso=0');
        } else {
            header('Location: /usuarios/listar-usuarios?sucesso=1');
        }
    }   
}