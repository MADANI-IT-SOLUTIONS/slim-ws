<?php

namespace App\Domain\Animal;
use Exception;
use PDO;

class AnimalRespository
{
    /**
     * @var PDO Connexion a la base des donnees
     */
    private $connexion;

    /**
     * AnimalRespository constructor.
     * @param PDO $connexion
     */
    public function __construct(PDO $connexion)
    {
        $this->connexion = $connexion;
    }

    public function getAllAnimals(){

        $sql_select = $this->connexion->query("SELECT * FROM animals");
        return $sql_select->fetchAll(PDO::FETCH_OBJ);
    }


}