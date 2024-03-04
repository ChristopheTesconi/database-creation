<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

Class Users extends CoreModel
{
    /**
     * @var int
     */
    protected $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $role;
    /**
     * @var string
     */
    private $password;
    /**
    * @var string
    */
   protected $created_at;
   /**
    * @var string
    */
   protected $updated_at;

    /**
     * Get the value of id
     *
     * @return  int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string $name 
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the value of email
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @param  string  $email
     */
    public function setemail(string $email)
    {
        $this->email = $email;
    }

        /**
     * Get the value of role
     *
     * @return  string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @param  string  $role
     */
    public function setRole(string $role)
    {
        $this->role = $role;
    }

        /**
     * Get the value of password
     *
     * @return  string
     */
    public function getpassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @param  string  $password
     */
    public function setNewPassword(string $clearPassword)
    {
        // On hash le mot de passe désiré avant sauvegarde en DB
        $this->password = password_hash($clearPassword, PASSWORD_DEFAULT);
    }

    /**
     * Get the value of created_at
     *
     * @return  string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * Get the value of updated_at
     *
     * @return  string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at ?? '';
    }

   /**
    * Méthode permettant de récupérer tous les enregistrements de la table users
    *
    *@return Users[]
    */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `users`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }
    /**
     * Méthode permettant de récupérer un user en bdd en fonction de son email
     * 
     * @param string $email adresse email
     * @return Users
     */
    public static function findByEmail(string $email)
    {
        // On se connecte à la BDD
        $pdo = Database::getPDO();

        // Requete SQL
        $sql = 'SELECT * FROM `users` WHERE `email` = :email';

        // On exécute la requete
        $pdoStatement = $pdo->prepare($sql);

        // On doit lier/binder les valeurs des paramètes à la requete préparée à l'aide de 
        // la méthode bindValue()
        $pdoStatement->bindValue(':email', $email, PDO::PARAM_STR);

        // On exécute la requete
        $pdoStatement->execute();

        // ON récupère le résultat de la base sous forme d'objet de la classe courante
        $item = $pdoStatement->fetchObject(self::class);

        // On retourne le résultat
        return $item;
    }
    /**
     * Méthode qui va récupérer un user en BDD en fonction de son Id
     * 
     * @param int $userId ID du user
     * @return Users
     */
    public static function find($userId)
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `users` WHERE `id` =' . $userId;
        $pdoStatement = $pdo->query($sql);
        $item = $pdoStatement->fetchObject(self::class);
        return $item;
    }
    /**
     * Méthode permettant d'ajouter un enregistrement dans la table app_user
     *
     * @return bool
     */
    protected function insert()
    {
        // Récupération de l'objet PDO représentant la connexion à la DB
        $pdo = Database::getPDO();

        // Ecriture de la requête INSERT INTO
        $sql = '
            INSERT INTO `users` (email, name, password, role)
            VALUES (:email, :name, :password, :role)
        ';

        // Préparation de la requête d'insertion (pas exec, pas query)
        $pdoStatement = $pdo->prepare($sql);

        // On bind chaque jeton/token/placeholder
        $pdoStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $pdoStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $pdoStatement->bindValue(':role', $this->role, PDO::PARAM_STR);

        // On exécute la requête préparée
        $ok = $pdoStatement->execute();

        // Si au moins une ligne ajoutée
        if ($pdoStatement->rowCount() > 0) {
            // Alors on récupère l'id auto-incrémenté généré par MySQL
            $this->id = $pdo->lastInsertId();

            // On retourne VRAI car l'ajout a parfaitement fonctionné
            return true;
            // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
        }

        // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
        return false;
    }
}