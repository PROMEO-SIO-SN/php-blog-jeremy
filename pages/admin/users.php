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

$userModel = new User();
$users = $userModel->getAll();

if (!empty($_POST)) {
    $userModel->delete($_POST['user_id']);

    header('location: /pages/admin/users.php');
}
?>

<div class="container pt-2">
    <a href="/pages/admin/create-user.php" class="btn btn-primary">Créer un utilisateur</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Prénom</th>
            <th scope="col">Nom</th>
            <th scope="col">Email</th>
            <th scope="col">Crée le</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user) : ?>
            <tr>
                <th scope="row"><?= $user['id'] ?></th>
                <td><?= $user['firstname'] ?></td>
                <td><?= $user['lastname'] ?></td>
                <td><?= $user['email'] ?></td>
                <td><?= $user['created_at'] ?></td>
                <td>
                    <form action="" method="post">
                        <input type="number" value="<?= $user['id'] ?>" name="user_id" hidden>
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>