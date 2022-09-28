<?php 

class Product {
    private $id;
    public $name;
    private $description;
    private $picture;
    private $price;
    private $created_at;
    private $updated_at;
    private $category_id;
    private $type_id;


    static public function findAll() {
        $sql = "
          SELECT *
          FROM product
          ;
        ";
    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
    
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');
      }








    static public function find($id) {
        $sql = "
        SELECT *
        FROM product
        WHERE id = $id;
        ";
    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
    var_dump($pdo);
        return $pdoStatement->fetchObject('Product');
    }

   
}

