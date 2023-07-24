<?php 

namespace App\Models;

use App\Database;
use PDO;

class Product {
    private $id;
    private $name;
    private $description;
    private $picture;
    private $price;
    private $status;
    private $created_at;
    private $updated_at;
    private $category_id;
    private $type_id;


    static public function findAll() {

        try {

            $sql = "
              SELECT *
              FROM product
              ;
            ";
        
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
        
            return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
        }
        catch (\PDOException $e) {
            echo 'cassé' . '<br/>';
            echo 'erreur: ' . $e->getMessage();
        }
      }

    static public function find($id) {

        try {

            $sql = "
            SELECT *
            FROM product
            WHERE id = $id;
            ";
        
            $pdo = Database::getPDO();
            $pdoStatement = $pdo->query($sql);
        //var_dump($pdo);
            return $pdoStatement->fetchObject('App\Models\Product');
        }
        catch (\PDOException $e) {
            echo 'cassé' . '<br/>';
            echo 'erreur: ' . $e->getMessage();
        }
    }

   



 /* *********************************getters et setters*********************************/


    // Ajout des getters et des setters afin d'avoir accès au propriétée en private 

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

    /**
     * Get the value of category_id
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set the value of category_id
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        if ($status != 1 && $status != 2)
        {
            //On bloque la modification du status si quelqu'un essaye de le modifier
        }
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
    /**
     * Get the value of type_id
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }


    
    
}

