<?php

use App\Config\Database;

class User
{
    // Properties
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    // Methods
    public function getAll()
    {
        $query = $this->pdo->query('SELECT * FROM users');
        $users = $query->fetchAll();

        return $users;
    }

    public function getOne(int $id)
    {
        $query = $this->pdo->prepare("SELECT users.id, firstname, lastname, email, created_at, label FROM users JOIN roles ON users.role_id = roles.id WHERE users.id = ?");
        $query->execute([$id]);

        return $query->fetch();
    }

    public function create(string $firstname, string $lastname, string $email, string $password, int $role_id)
    {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $query = $this->pdo->prepare("INSERT INTO users (firstname, lastname, email, password, role_id) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$firstname, $lastname, $email, $password_hash, $role_id]);

        return $query;
    }

    public function delete(int $id)
    {
        $query = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
        $query->execute([$id]);

        return $query;
    }
}