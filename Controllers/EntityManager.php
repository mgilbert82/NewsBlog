<?php

class EntityManager
{

    //Attributs
    protected $pdo;

    public function __construct()
    {
        $host = "localhost";
        $dbName = "news";
        $dbUsername = "root";
        $dbPassword = "root";

        try {
            $this->setPdo(new PDO("mysql:host=$host;dbname=$dbName", $dbUsername, $dbPassword));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getPdo()
    {
        return $this->pdo;
    }

    public function setPdo($pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }
}
