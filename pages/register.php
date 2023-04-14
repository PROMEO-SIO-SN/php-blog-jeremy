<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inscription</title>
</head>
<body>
<h1>Inscription</h1>
<form action="../app/auth/register.php" method="post">
    <label for="firstname">Prénom</label>
    <input id="firstname" type="text" name="firstname">
    <label for="lastname">Nom</label>
    <input id="lastname" type="text" name="lastname">
    <label for="email">Email</label>
    <input id="email" type="email" name="email">
    <label for="password">Mot de passe</label>
    <input id="password" type="password" name="password">
    <button type="submit">S'inscrire</button>
</form>
</body>
</html>