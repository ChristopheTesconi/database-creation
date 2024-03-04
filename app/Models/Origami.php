<?php

namespace App\Models;

use App\Utils\Database;
Use PDO;

class Origami extends CoreModel
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
    private $description;
    /**
     * @var string
     */
    protected $created_at;
    /**
     * @var string
     */
    protected $updated_at;
        /**
     * @var int
     */
    private $users_id;

    /**
     * Méthode permettant de récupérer tous les enregistrements de la table origami
     *
     * @return Origami[]
     */
    public static function findAll()
    {
        $pdo = Database::getPDO();
        $sql = 'SELECT * FROM `origamis`';
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $results;
    }

    /**
     * Méthode permettant d'ajouter un origami dans la table 'origamis'
     * 
     * @return bool
     */
protected function insert()
{
    // Récupération de l'objet PDO qui représente la connexion à la base de données
    $pdo = Database::getPDO();
    
    //Ecriture de la requete sql INSERT INTO
    $sql = '
    INSERT INTO `origamis` (name, description) VALUES (:name, :description)
    ';

    // Préparation de la requete d'insertion
    $pdoStatement = $pdo->prepare($sql);

    // On bind ou lie chaque placeholder
    // Un placeholder est un marqueur ou un symbole utilisé dans 
    // une requete SQL pour représenter une valeur qui sera fournie plus tard,
    // lors de l'exécution de la requete.
    $pdoStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
    $pdoStatement->bindValue(':description', $this->description, PDO::PARAM_STR);

    // On exécute la requete préparée
    $ok = $pdoStatement->execute();

    // Si au moins une ligne est ajoutée
    if ($pdoStatement->rowCount() > 0) {
        // Alors on récupère l'id auto-incrémenté généré par MySQL
        $this->id = $pdo->lastInsertId();

        // On retourne vrai car l'ajout a parfaitement fonctionné
        return true;
        // => l'interpréteur PHP sort de cette fonction car on a retourné une donné
    }

    // Si on arrive ici, c'est que quelque chose n'a pas fonctionné donc on retourne FAUX
    return false;
}

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
     * Get the value of description
     *
     * @return  string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  string  $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
     * Get the value of users_id
     *
     * @return int
     */
    public function getUsersId()
    {
        return $this->users_id;
    }

    /**
     * Set the value of users_id
     *
     * @param int $users_id
     */
    public function setUsersId(int $usersId)
    {
        $this->users_id = $usersId;
    }
}
