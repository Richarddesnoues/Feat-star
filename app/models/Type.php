<?php


namespace App\Models;

use App\Database;

class Type 
{
    private $id;
    private $name;




    static public function find($id) {
        try{

            $sql = "
            SELECT *
            FROM type
            WHERE id = $id;
            ";
        
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
        //var_dump($pdo);
            return $pdoStatement->fetchObject('App\Models\Type');
        }
        catch (\PDOException $e) {
            echo 'cassé' . '<br/>';
            echo 'erreur: ' . $e->getMessage();
        }
    }

/***************************************GETTERS et SETTERS***************************************** */



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}