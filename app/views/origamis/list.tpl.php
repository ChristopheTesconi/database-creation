<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Origami BackOffice</title>

    <!-- Getting bootstrap (and reboot.css) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--
        And getting Font Awesome 4.7 (free)
        To get HTML code icons : https://fontawesome.com/v4.7.0/icons/
    -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />

    <!-- We can still have our own CSS file -->
    <link rel="stylesheet" href="<?= $assetsBaseUri ?>css/style.css">
</head>

<body>

<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= $router->generate('main-home') ?>">Origami</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('main-home') ?>">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('origami-list') ?>">Origamis</a>
                    </li>
                    <li class="nav-item">
                </ul>
            </div>
        </div>
    </nav>

<h2>Liste des Origamis</h2>
<div class="container my-4">
<table class="table table-hover mt-4">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Créé le</th>
            <th scope="col">Modifié le</th>
            <th scope="col">Utilisateurs</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($origamisList as $currentOrigami) : ?>
        <tr>
            <th scope="row"><?= $currentOrigami->getId() ?></th>
            <td><?= $currentOrigami->getName() ?></td>
            <td><?= $currentOrigami->getDescription() ?></td>
            <td><?= $currentOrigami->getCreatedAt() ?></td>
            <td><?= $currentOrigami->getUpdatedAt() ?></td>
            <td><?= $currentOrigami->getUsersId() ?></td> 
        </tr>
        <?php endforeach ?>
    </tbody>
</table>

</div>

<!-- And for every user interaction, we import Bootstrap JS components -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>

<!-- <a class="nav-link" href="<?= $router->generate('student-list') ?>">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('appuser-list') ?>">Commentaires</a>
                    </li>
                    {# <?php if (!empty($_SESSION['connectedUserId'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $router->generate('appuser-logout') ?>">Se déconnecter</a> 
                    </li>
                    <?php endif ?> #} --> 