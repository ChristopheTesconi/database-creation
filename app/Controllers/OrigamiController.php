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
                // 'token' => $this->generateToken()
            ]
        );
    }
}
