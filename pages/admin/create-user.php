<?php
require "../../app/auth/checkIsNotConnected.php";
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                BLOG
            </a>

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/pages/admin.php" class="nav-link px-2 text-secondary">Dashboard</a></li>
                <li><a href="/pages/admin/articles.php" class="nav-link px-2 text-white">Articles</a></li>
                <li><a href="/pages/admin/comments.php" class="nav-link px-2 text-white">Commentaires</a></li>
                <li><a href="/pages/admin/users.php" class="nav-link px-2 text-white">Utilisateurs</a></li>
            </ul>

            <div class="text-end">
                <form action="../app/auth/disconnection.php">
                    <button type="button" class="btn btn-danger">Se déconnecter</button>
                </form>
            </div>
        </div>
    </div>
</header>

<?php
require "../../app/config/Database.php";
require "../../app/Models/User.php";
require "../../app/Models/Role.php";

$roleModel = new Role();
$roles = $roleModel->getAll();

if (!empty($_POST)) {
    $userModel = new User();
    $users = $userModel->create(
        $_POST['firstname'],
        $_POST['lastname'],
        $_POST['email'],
        $_POST['password'],
        $_POST['role'],
    );

    header('location: /pages/admin/users.php');
}
?>

<div class="container">
    <form action="" method="post">
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname">
        <label for="lastname">Nom</label>
        <input type="text" id="lastname" name="lastname">
        <label for="email">Email</label>
        <input type="text" id="email" name="email">
        <label for="password">Mot de passe</label>
        <input type="text" id="password" name="password">
        <label for="role">Rôle</label>
        <select name="role" id="role">
            <?php foreach ($roles as $role): ?>
                <option value="<?= $role['id'] ?>"><?= $role['label'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Enregistrer</button>
    </form>
</div>
</body>
</html>