<?php
require "../app/auth/checkIsConnected.php"
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion</title>
</head>
<body>
<h1>Connexion</h1>
<form action="../app/auth/login.php" method="post">
    <?php if (isset($_SESSION['connection_error']) && $_SESSION['connection_error']) :?>
        <p>L'email et/ou le mot de passe est incorrect !</p>
    <?php endif; ?>

    <label for="email">Email</label>
    <input id="email" type="email" name="email">
    <label for="password">password</label>
    <input id="password" type="password" name="password">
    <button type="submit">Se connecter</button>
</form>
</body>
</html>