<?php

class Category {
    public $id;
    public $name;
    private $subtitle;
    private $picture;
    private $created_at;
    private $updated_at;
    private $product_id;
    private $type_id;




    static public function find($id) {
        $sql = "
        SELECT *
        FROM category
        WHERE id = $id;
        ";
    
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
    var_dump($pdo);
        return $pdoStatement->fetchObject('Category');
    }
}