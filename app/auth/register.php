<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'jeremy', 'toor');
} catch (PDOException $error) {
    var_dump($error);
    die();
}

$password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);

$query = $pdo->prepare('INSERT INTO users (firstname, lastname, email, password, role_id) VALUES (:firstname, :lastname, :email, :password, :role_id);');
$query->execute([
    'firstname' => $_POST['firstname'],
    'lastname' => $_POST['lastname'],
    'email' => $_POST['email'],
    'password' => $password_hash,
    'role_id' => 3
]);

header('location: /');