<?php

namespace App\Models;

use App\Database;
use PDO;

class Category {
    public $id;
    public $name;
    private $subtitle;
    private $picture;
    private $created_at;
    private $updated_at;
    private $product_id;
    private $type_id;




     public function products() {
        $sql = "
        SELECT *
        FROM product
        WHERE category_id = $this->id
        ";
    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);

        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Product');
    }

    static public function findAll() {
        $sql = "
          SELECT *
          FROM category
          ;
        ";

    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
    
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'App\Models\Category');
      }
    /**
     * La method find permet de retrouver en BDD les infos d'un produit spécifique, en fonction d'un ID.
     *
     * 
     */
      static public function find($id) {
        $sql = "
          SELECT *
          FROM category
          WHERE id = $id
          ;
        ";
    
        $pdo = Database::getPDO();//connection
        $pdoStatement = $pdo->query($sql);// exécution
    
        return $pdoStatement->fetchObject('App\Models\Category');
      }



    /* *********************************getters et setters*********************************/

// Ajout des getters et des setters afin d'avoir accès au propriétée en private 




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
     * Get the value of subtitle
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set the value of subtitle
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

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
     * Get the value of product_id
     */ 
    public function getProduct_id()
    {
        return $this->product_id;
    }

    /**
     * Set the value of product_id
     *
     * @return  self
     */ 
    public function setProduct_id($product_id)
    {
        $this->product_id = $product_id;

        return $this;
    }

   

  

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
}