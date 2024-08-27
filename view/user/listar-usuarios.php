<?php

/** @var \Elaine\Mvc\model\UserModel[] $userList */

foreach($userList as $user) {

?>
<h2><?= $user->name; ?></h2>
    <p><?=$user->email; ?></p>
    <a href="/usuario/editar-usuario?id=<?= $user->id?>">Editar</a>
    <a href="/usuario/deletar-usuario?id=<?= $user->id?>">Deletar</a>
<?php
} ?>
<a href="/usuario/criar-usuario">Novo Usuario</a>
