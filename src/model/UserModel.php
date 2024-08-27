<?php

namespace Elaine\Mvc\model;

class UserModel
{
    public readonly int $id;
    public string $name;
    public string $email;
    public string $password;

    public function __construct(string $name, string $email, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }
}
