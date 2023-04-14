<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'jeremy', 'toor');
} catch (PDOException $error) {
    var_dump($error);
    die();
}