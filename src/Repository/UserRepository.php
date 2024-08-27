<?php

namespace Elaine\Mvc\Repository;

use Elaine\Mvc\model\UserModel;
use http\Client\Curl\User;

class UserRepository
{
    public function __construct(private \PDO $pdo)
    {
    }

    public function find(string $email): UserModel
    {
        $sql = 'SELECT * FROM usuario WHERE email = :email;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':email', $email);
        $stmt->execute();

        return $this->hydrateUser($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    public function findId(int $id) 
    {
        $sql = 'SELECT * FROM usuario WHERE id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $this->hydrateUser($stmt->fetch(\PDO::FETCH_ASSOC));
    }


    public function all(): array
    {
        $userList = $this->pdo
            ->query('SELECT * FROM usuario;')
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map(
            $this->hydrateUser(...),
            $userList
        );
    }

    public function hydrateUser(array $userInfo): UserModel
    {
        $user = new UserModel($userInfo['nome'], $userInfo['email'], $userInfo['senha']);
        $user->setId($userInfo['id']);

        return $user;
    }


    public function add(UserModel $user): bool
    {
        $hash = password_hash($user->password, PASSWORD_ARGON2ID);
        $sql = 'INSERT INTO usuario (id, senha, nome, email) VALUES (:id, :senha, :nome, :email);';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', 2);
        $stmt->bindValue(':senha', $user->password);
        $stmt->bindValue(':nome', $user->name);
        $stmt->bindValue(':email', $user->email);
        
        return $stmt->execute();
    }

    public function edit(UserModel $user): bool
    {
        $hash = password_hash($user->password, PASSWORD_ARGON2ID);
        $sql = 'UPDATE usuario SET senha = :senha, nome = :nome, email = :email; WHERE id = :id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':senha', $user->password);
        $stmt->bindValue(':nome', $user->name);
        $stmt->bindValue(':email', $user->email);
        $stmt->bindValue(':id', $user->id, \PDO::PARAM_INT);

        $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = 'DELETE FROM usuario WHERE id = :id;';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }
}
