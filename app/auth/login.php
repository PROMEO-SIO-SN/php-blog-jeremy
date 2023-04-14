<?php
require '../config/database.php';

$query = $pdo->prepare('SELECT firstname, lastname, email, password, role_id FROM users WHERE email = ?');
$query->execute([$_POST['email']]);

$user = $query->fetch();

session_start();
unset($_SESSION['connection_error']);

if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['is_connected'] = true;
    $_SESSION['user'] = $user;

    if ($user['role_id'] == 3) {
        header('location: /');
    } else {
        header('location: /pages/admin.php');
    }
} else {
    $_SESSION['connection_error'] = true;

    header('location: /pages/login.php');
}