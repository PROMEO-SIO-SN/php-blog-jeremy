<?php

namespace App\Config;

class Database
{
    // Properties
    private string $host = 'localhost';
    private string $database = 'blog';
    private string $username = 'jeremy';
    private string $password = 'toor';

    public function getPdo()
    {
        try {
            $pdo = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
        } catch (\PDOException $error) {
            var_dump($error);
            die();
        }

        return $pdo;
    }
}