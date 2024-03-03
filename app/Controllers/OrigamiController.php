<?php

namespace App\Controllers;

use App\Models\Origami;

class OrigamiController extends CoreController
{

    /**
     * Méthode s'occupant de la page listant les origamis
     *
     * @return void
     */
    public function list()
    {
        // On commence par récupérer tous les Origamis
        $items = Origami::findAll();

        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show(
            'origamis/list',
            [
                'origamisList' => $items,
                // Le token anti-CSRF
                 'token' => $this->generateToken()
            ]
        );
    }

    /**
     * Méthode qui va afficher le formulaire d'ajout d'un origami
     * 
     * @return void
     */
    public function add()
    {
        // On appelle la méthode show de l'objet courant
        // En argument, on fournit le fichier de vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du controller
        $this->show(
            'origamis/add',
            [
                // Pour préremplir, on doit fournir un modèle origami, avec des valeurs vides
                'origami' => new Origami(),
                //Et le token anti-CSRF
                'token' => $this->generateToken()
            ]
            );
    }

    /**
     * Méthode s'occuant des données envoyées en POST par le formulaire d'ajout
     * 
     * @return void
     */
    public function addPost()
{
    //On récupère les données
    $name = filter_input(INPUT_POST, 'name');
    $description = filter_input(INPUT_POST, 'description');

    //On valide ces données
    $errorList = [];

    if (empty($name)) {
        $errorList[] = 'Le Nom saisi est vide';
    }
    if (empty($description)) {
        $errorList[] = 'Il faut ajouter une description';
    }

    // Si il n'y a pas d'erreurs dans les données
    if (empty($errorList)) {
        // On crée un nouveau modèle
        $origami = new Origami();

        // On met en place les niuvelles propriétées
        $origami->setName($name);
        $origami->setDescription($description);

        // On sauvegarde en BDD
        if ($origami->save()) {
            // si la sauvegarde a fonctionné, on redirige
            $this->redirectToRoute('origami-list', ['id' => $origami->getId()]);
        } else {
            // On ajoute un message d'erreur
            $errorList[] = 'La sauvegarde a échoué';
        }
    }

    // S'il y a des erreurs
    if (!empty($errorList)) {
        // On réaffiche le formulaire 
        // ON a besoin de renseigner un model Origami pour préremplir le formulaire
        $origami = new Origami();
        if ($name !== null) {
            $origami->setName($name);
        }
        if ($description !== null) {
            $origami->setDescription($description);
        }


        //En préremplissant les données
        $this->show(
            'origamis/add',
            [
                // ON préremplit les input avec les données BRUTES en post, stockées dans le modèle
                'origami' => $origami,
                // On transmet aussi le tableau d'erreurs
                'errorList'=> $errorList,
                // ET le token anti-CSRF
                'token' => $this->generateToken()
            ]
        );
    }
}
}
