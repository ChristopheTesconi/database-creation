<?php

namespace app;

//use app\Database;
use app\Origami;

// Inclure le fichier contenant la définition de votre classe Origami
require_once 'Origami.php';
require_once 'Database.php';

// Appeler la fonction find avec un identifiant d'origami (par exemple, 1)
$origami = Origami::find(2);

// Vérifier si la connexion à la base de données est établie
if ($origami) {
    echo "Connexion à la base de données établie avec succès!";
} else {
    echo "Erreur lors de la connexion à la base de données.";
}

// Afficher le résultat dans le navigateur
echo "<pre>";
print_r($origami);
echo "</pre>";
