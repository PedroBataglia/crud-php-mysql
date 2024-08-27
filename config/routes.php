<?php

return [
    'GET|/' => \Elaine\Mvc\Controller\PostsController\ListPostController::class,
    'GET|/pagina-inicial' => \Elaine\Mvc\Controller\HomeBlogController::class,
    'GET|/editar-post' => \Elaine\Mvc\Controller\PostsController\FormPostController::class,
    'POST|/editar-post' => \Elaine\Mvc\Controller\PostsController\EditPostController::class,
    'GET|/novo-post' => \Elaine\Mvc\Controller\PostsController\FormPostController::class,
    'POST|/novo-post' => \Elaine\Mvc\Controller\PostsController\CreatePostController::class,
    'GET|/listar-posts' => \Elaine\Mvc\Controller\PostsController\ListPostController::class,
    'GET|/deletar-post' => \Elaine\Mvc\Controller\PostsController\DeletePostController::class,
    'GET|/usuario/login' => \Elaine\Mvc\Controller\UserController\LoginFormController::class,
    'POST|/usuario/login' => \Elaine\Mvc\Controller\UserController\UserLoginController::class,
    'GET|/usuario/criar-usuario' => Elaine\Mvc\Controller\UserController\FormUserController::class,
    'POST|/usuario/criar-usuario' => Elaine\Mvc\Controller\UserController\CreateUserController::class,
    'GET|/usuarios/listar-usuarios' => \Elaine\Mvc\Controller\UserController\ListUserController::class,
    'GET|/usuario/deletar-usuario' => \Elaine\Mvc\Controller\UserController\DeleteUserController::class,
    'GET|/usuario/editar-usuario' => \Elaine\Mvc\Controller\UserController\FormUserController::class,
    'POST|/usuario/editar-usuario' => \Elaine\Mvc\Controller\UserController\EditUserController::class,
    'GET|/teste-wysiwyg' => \Elaine\Mvc\Controller\EditorJsController::class,
];
