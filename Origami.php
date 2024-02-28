<?php

use database;
use PDO;

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
    $sql = 'SELECT * FROM origamis '
}