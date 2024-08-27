<?php

/** @var \Elaine\Mvc\model\PostModel[] $postList */
foreach ($postList as $post){
    ?>

    <h2><?= $post->titulo; ?></h2>
    <p><?= $post->descricao;?></p>
    <p><?= $post->tipo;?></p>
    <p><?= $post->dataCriacao->format('m/d/Y g:i A') ?></p>
    <a href="/editar-post?id=<?= $post->id;?>" >Editar</a>
    <a href="/deletar-post?id=<?= $post->id;?>">Deletar</a>

<?php
}
?>
<a href="/novo-post">Novo Post +</a>
