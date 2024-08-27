<?php
/** @var \Elaine\Mvc\model\UserModel $user  */

?>

<form method="post">
    <input
    name="name"
    type="text"
    value="<?= $user?->name; ?>"
    placeholder="Nome...">

    <input
    name="email"
    type="email"
    value="<?= $user?->email; ?>"
    placeholder="email@exemplo.com.br...">

    <input
    name="password"
    type="password"
    value="<?= $user?->password; ?>"
    placeholder="insira sua senha">
    <button>Enviar</button>
</form>