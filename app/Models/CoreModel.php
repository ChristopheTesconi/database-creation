<?php

namespace App\Models;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models
abstract class CoreModel
{
        /**
     * Méthode permettant de sauvegarder un Model (insert ou update)
     *
     * @return bool
     */
    public function save()
    {
        // si le Model existe déjà (id > 0)
        if ($this->id > 0) {
            // Alors on met à jour
            return $this->update();
        } else {
            return $this->insert();
        }
    }

    // Pour que la méthode save() fonctionne bien, chaque Model doit avoir déclaré les méthodes insert et update en protected
    // Donc, puisque CoreModel est une classe abstraite, on peut forcer les classes "enfants" à déclarer (implémenter) ces méthodes
    abstract protected function insert();
    //abstract protected function update();
}