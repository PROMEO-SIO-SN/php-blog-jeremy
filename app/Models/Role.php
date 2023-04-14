<?php

use App\Config\Database;

class Role
{
    // Properties
    private $pdo;

    public function __construct()
    {
        $database = new Database();
        $this->pdo = $database->getPdo();
    }

    public function getAll()
    {
        $query = $this->pdo->query('SELECT * FROM roles');
        $users = $query->fetchAll();

        return $users;
    }
}