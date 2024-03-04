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
                        <a class="nav-link" href="<?= $router->generate('user-list') ?>">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="<?= $router->generate('origami-add') ?>">Ajouter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-4">
    <a href="<?= $router->generate('origami-list') ?>" class="btn btn-success float-end mt-2 mr-2">Retour</a>
        <h2><?php if (!empty($origamiId)) : ?>Mettre à jour<?php else : ?>Ajouter<?php endif ?> un origami</h2>
        
        <form action="" method="POST" class="mt-5">
            <input type="hidden" name="token" value="<?= $token ?>">
            <div class="mb-3">
                <label class="form-label" for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="" value="<?= $origami->getName() ?>">
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="" value="<?= $origami->getDescription() ?>">
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary btn-block mt-5">Valider</button>
            </div>
        </form>
        </div>

        

<!-- And for every user interaction, we import Bootstrap JS components -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>

</html>