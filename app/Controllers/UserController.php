<?php

namespace App\Controllers;

use App\Models\Users;

class UserController extends CoreController
{
    /**
     * Méthode qui va afficher la liste des utilisateurs
     * 
     * @return void
     */
    public function list()
    {
        // On récupère tous les users
        $items = Users::findAll();

        // On appelle la méthode show de l'objet courant
        // En argument, on fournit le fichier de vue
        // Par convention, les fichiers de vue seront dans un sous-dossier du nom du controller
        $this->show(
            'users/list',
            [
                'usersList' => $items,
                // Le token anti-csrf
                'token' => $this->generateToken()
            ]
            );
    }
    /**
     * Méthode qui va s'occupper du sign in des users
     * 
     * @return void
     */
    public function signin()
    {
        // On appelle la méthode show de l'objet courant
        // En argument, on fournit le fichier de vue
        // Par convention, les fichiers de vue seront dans un sous-dossier du nom du controller
        $this->show(
            'users/signin',
            [
                // On préremplit les input avec du vide
                'email' => '',
                'password' => '',
                // ET le token anti-csrf
                'token' => $this->generateToken()
            ]
        );
    }
    /**
     * Méthode qui va s'occuper de l'envoi des données en POST afin de connecter l'utilisateur
     * 
     * @return void
     */
    public function signinPost()
    {
        // On récupère les 2 données 
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');

        // ON valide ces données
        $errorList = [];

        if(empty($email)) {
            $errorList[] = 'L\'adresse email saisie est vide ou incorrecte';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe saisi est vide';
        }
        if (strlen($password) < 6) {
            $errorList[] = 'Le mot de passe saisi doit faire au moins 6 caractères';
        }

        // Si il n'y a aucune erreur dans les données
        if(empty($errorList)) {
            // On récupère l'objet User pour l'email fourni
            $user = Users::findByEmail($email);

            // SI on a pas trouvé de user pour cet email
            if(empty($user)) {
                // On ajoute un message d'erreur
                $errorList[] = 'Les identifiants sont erronés ou inexistant'; 
            } else { // Sinon, si on a bien trouvé un user
                // Alors, on peut voir si le mot de passe saisi est bien identique au mot de passe 
                // en BDD et si c'est le bon de mot passe, alors :
                if (password_verify($password, $user->getPassword())) {
                    //Alors on connecte l'user
                    $_SESSION['connectedUser'] = $user;
                    $_SESSION['connectedUserId'] = $user->getId();

                    // Puis on redirige vers l'accueil
                    $this->redirectToRoute('main-home');
                } else { //Informer l'utilisateur que les identifiants sont incorrects
                    $errorList[] = 'Les identifiants sont erronés ou inexistant';
                    $this->show(
                        'users/signin',
                        [
                            'email' => '',
                            'password' => '',
                            'errors' => $errorList,
                            'token' => $this->generateToken()
                        ]
                    );
                } 
            }
            
        }
    }
    /**
     * Méthode s'occupant de la page d'ajout d'un user
     *
     * @return void
     */
    public function add()
    {
        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        $this->show(
            'users/add',
            [
                // Pour pré-remplir, on doit fournir un Model appuser, avec des valeurs vides
                'user' => new Users(),
                // Et le token anti-CSRF
                'token' => $this->generateToken()
            ]
        );
    }

    /**
     * Méthode s'occupant des données envoyées en POST par le formulaire d'ajout
     *
     * @return void
     */
    public function addPost()
    {
        // On récupère les 2 données
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $name = filter_input(INPUT_POST, 'name');
        $password = filter_input(INPUT_POST, 'password');
        $role = filter_input(INPUT_POST, 'role');

        // On valide ces données
        $errorList = [];

        if (empty($email)) {
            $errorList[] = 'L\'adresse email est vide ou incorrecte';
        }
        if (empty($name)) {
            $errorList[] = 'Le nom saisi est vide';
        }
        if (empty($password)) {
            $errorList[] = 'Le mot de passe est vide';
        }
        if (strlen($password) < 6) {
            $errorList[] = 'Le mot de passe doit faire au moins 6 caractères';
        }
        if ($role != 'admin' && $role != 'user') {
            $errorList[] = 'Le role sélectionné est incorrect';
        }

        // S'il n'y a aucune erreur dans les données
        if (empty($errorList)) {
            // On crée un nouveau Model
            $user = new Users();

            // On met à jour les propriétés
            $user->setEmail($email);
            $user->setName($name);
            $user->setNewPassword($password);
            $user->setRole($role);

            // On sauvergarde en DB
            if ($user->save()) {
                // Si la sauvegarde a fonctionné, on redirige
                $this->redirectToRoute('user-list', ['id' => $user->getId()]);
            } else {
                // On ajoute un message d'erreurs
                $errorList[] = 'La sauvegarde a échoué';
            }
        }

        // S'il y a des erreurs
        if (!empty($errorList)) {
            // On réaffiche le formulaire
            // On a besoin de renseigner un Model User pour pré-remplir le formulaire
            $user = new User();
            $user->setEmail($email);
            $user->setName($name);
            $user->setNewPassword($password);
            $user->setRole($role);
            $user->setStatus($status);

            // En pré-remplissant les données
            $this->show(
                'users/add',
                [
                    // On pré-remplit les input avec les données BRUTES en POST, stockées dans le Model
                    'user' => $user,
                    // On transmet aussi le tableau d'erreurs
                    'errorList' => $errorList,
                    // Et le token anti-CSRF
                    'token' => $this->generateToken()
                ]
            );
        }
    }
}
