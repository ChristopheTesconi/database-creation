<?php

namespace app;

use PDO;
use Database;

class Origami {
/**
 * Méthode permettant de récupérer un enregistrement de la table origamis en fonction d'un id donné
 * @param int $origamiId ID de l'origami
 * @return Origami
 */
public static function find($origamiId)
{
    //Se connecter à la BDD
    $pdo = Database::getPDO();

    //écrire notre requete
    $sql = 'SELECT * FROM `origamis` WHERE `id` =' . $origamiId;

    //Exécuter notre requete 
    $pdoStatement = $pdo->query($sql);

    //un seul résultat => fetchObject
    //self::class fournit automatiquement le FCQN de la classe dans laquelle on utilise le mot-clé "self"
    $item = $pdoStatement->fetchObject(self::class);

    //On retourne le résultat
    return $item;
}
}