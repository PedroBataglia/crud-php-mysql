<?php

/**@var PostModel $post*/

use Elaine\Mvc\model\PostModel;

?>

<form method="post">
    <input
            name="titulo"
            type="text"
            value="<?= $post?->titulo; ?>"
            placeholder="insira o titulo...">
    <input
            name="descricao"
            type="text"
            value="<?= $post?->descricao; ?>"
            placeholder="insira a descrição...">
    <input
            name="conteudo"
            type="text"
            value="<?= $post?->conteudo; ?>"
            placeholder="insira o conteudo...">
    <select name="tipo">
        <option>Video</option>
        <option>Artigo</option>
    </select>
    <button>Salvar</button>
</form>
