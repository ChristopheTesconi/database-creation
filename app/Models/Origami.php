<?php

namespace App\Models;

use App\Utils\Database;
Use PDO;

class Origami
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
     * @param  string  $name
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
