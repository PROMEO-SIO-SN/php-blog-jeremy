<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog</title>
</head>
<body>
<h1>Mon blog</h1>
<?php
session_start();

if (isset($_SESSION['is-connected']) && $_SESSION['is_connected']) : ?>
    <form action="app/auth/disconnection.php">
        <button type="submit">Se déconnecter</button>
    </form>
<?php endif; ?>
</body>
</html>