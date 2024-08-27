<?php

namespace Elaine\Mvc\model;

use http\Exception\InvalidArgumentException;

class PostModel
{
    public readonly int $id;
    public string $titulo;
    public string $conteudo;
    public string $tipo;
    public string $descricao;
    public \DateTime $dataCriacao;
    public int $idUser;

    public function __construct(string $titulo, string $conteudo, string $tipo, string $descricao, \DateTime $dateTime)
    {
        $this->titulo = $titulo;
        $this->conteudo = $conteudo;
        $this->descricao = $descricao;
        $this->dataCriacao = $dateTime;
        $this->tipo = $tipo;
    }

    public function validaId(int $id)
    {
        if (filter_var($id, FILTER_VALIDATE_INT) === false) {
            throw new InvalidArgumentException();
        }
        $this->setId($id);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function isAnUrl(postModel $post)
    {
    
        $url = filter_has_var('conteudo', $post->conteudo, FILTER_VALIDATE_URL);
    }

    

}
