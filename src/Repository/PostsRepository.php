<?php

namespace Elaine\Mvc\Repository;

use Cassandra\Date;
use Elaine\Mvc\model\PostModel;

class PostsRepository
{


    public function __construct(private \PDO $pdo)
    {
    }


    public function find(int $id)
    {
        $sql = 'SELECT * FROM post WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $this->hydratePost($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    public function add(PostModel $post): bool
    {
        $postTime = $this->formatTime($post->dataCriacao);
        $sql = 'INSERT INTO blog.post (id, conteudo, descricao, titulo, data, tipo, idUser) VALUES (:id, :conteudo, :descricao, :titulo,:datatime, :tipo, :idUser);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id',4);
        $stmt->bindValue(':conteudo', $post->conteudo);
        $stmt->bindValue(':descricao', $post->descricao);
        $stmt->bindValue(':titulo', $post->titulo);
        $stmt->bindValue(':datatime', $postTime);
        $stmt->bindValue(':tipo', $post->tipo);
        $stmt->bindValue(':idUser', null);

        $result = $stmt->execute();
        $id = $this->pdo->lastInsertId();
        $post->setId(intval($id));

        return $result;
    }


    public function formatTime(\DateTime $dateTime): string
    {
        $timeFormat = $dateTime->format('Y-m-d h:i:s');

        return $timeFormat;
    }



    public function edit(PostModel $post): bool
    {
        $postTime = $this->formatTime($post->dataCriacao);
        $sql = 'UPDATE post SET conteudo = :conteudo, descricao = :descricao, titulo = :titulo, data = :datatime, tipo = :tipo WHERE id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':conteudo', $post->conteudo);
        $stmt->bindValue(':descricao', $post->descricao);
        $stmt->bindValue(':titulo', $post->titulo);
        $stmt->bindValue(':datatime', $postTime);
        $stmt->bindValue(':tipo', $post->tipo);
        $stmt->bindValue(':id', $post->id, \PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function all(): array
    {
        $videoList = $this->pdo
            ->query('SELECT * FROM post;')
            ->fetchAll(\PDO::FETCH_ASSOC);


        return array_map(
            $this->hydratePost(...),
            $videoList);
    }

    public function hydratePost(array $postInfo): PostModel
    {
        $post = new PostModel($postInfo["titulo"], $postInfo['conteudo'], $postInfo['tipo'], $postInfo['descricao'], new \DateTime($postInfo['data']));
        $post->setId($postInfo['id']);


        return $post;
    }

    public function delete(int $id): bool
    {
        $sql = 'DELETE FROM post WHERE id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        return $stmt->execute();
    }
}
