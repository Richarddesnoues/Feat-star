<?php


namespace App\Models;

use App\Database;


class Customer extends CoreModel
{
    protected $id;    
    private $pseudo;
    private $email;
    private $password;
    


    /**
     * Methode permettant de trouver tous les utilisateur dans la BDD
     *
     * @return void
     */
    public static function findAll()
    {
       
    }

    public static function find($customerId)
    {


        $sql = "
            SELECT *
            FROM customers
            WHERE id = $customerId;
            ";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        //var_dump($pdo);
        $result = $pdoStatement->fetchObject(self::class);
        return $result;
    }








    public function insert()
    {
        try {


            $pdo = Database::getPDO();

            $sql = " INSERT INTO `customers` (pseudo, email, password )  
                VALUE (:pseudo, :email , :password)";

            $query = $pdo->prepare($sql);


            $query->bindValue(':pseudo', $this->pseudo);
            $query->bindValue(':email', $this->email);
            $query->bindValue(':password', $this->password);

            $query->execute();

            // Si au moins une ligne ajoutée
            if ($query->rowCount() > 0) {
                // Alors on récupère l'id auto-incrémenté généré par MySQL
                $this->id = $pdo->lastInsertId();

                // On retourne VRAI car l'ajout a parfaitement fonctionné
                return true;
                // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
            }

            // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
            return false;
        } catch (\PDOException $e) {
            echo 'cassé' . '<br/>';
            echo 'erreur: ' . $e->getMessage();
        }
    }




    

    public function update()
    {
        $pdo = Database::getPDO();
        $sql = " UPDATE `customers` 
                 SET    `pseudo` = :pseudo,
                        `email` = :email,
                        `password` = :password,
                         WHERE id = :id";


        $query = $pdo->prepare($sql);


        $query->bindValue(':pseudo', $this->pseudo);
        $query->bindValue(':email', $this->email);
        $query->bindValue(':password', $this->password);

        $query->execute();

        // On retourne VRAI, si au moins une ligne ajoutée
        return ($query->rowCount() > 0);
    }











    static function finByEmail($email)
    {
        // #1 connection à la base de donnée
        $pdo = Database::getPDO();


        // #2 Construction de la requête avec un marqueur dynamique pour l'email  
        $sql = "SELECT * FROM `customers`
        WHERE `email` = :email"; // :email est un jeton(token) dynamique qui évite de mettre une variable $email et ce qu'elle contient par exemple ce qui évite les injection sql

        // #3 Préparation de la requête
        $query = $pdo->prepare($sql);
        // "prepare" renvoie un objet PDOstatement 


        // #4 On remplace les valeurs dynamique du token(:email) par le "vrai" email ($email)
        // par defaut , bindValue utilise le filtre PARAM_STR donc pas besoin de le renseigner
        $query->bindValue(':email', $email);


        // #5 On exécute la requête

        $query->execute();

        // On prend le résultat et on instancie la classe dans laquelle on se situe.
        // je veux récupérer un utilisateur pour cela je prends mon objet PDOstatement qui contient les résultats($query->execute)
        // mais de base ce résultat n'est pas compréhensible il faut le traduire dans un language qu'il comprends
        // ce qu'il comprends c'est un objet de la class User donc on instancie une nouvelle fois la class user
        // et comme elle s'appelle elle même , on mets (self::class) à la place de (App\Models\User)
        $customer = $query->fetchObject(self::class);

        // si je  récupere un utilisateur on renvoie cet utilisateur sinon on renvoie false

        return $customer;
    }



    /***********************************GETTERS AND SETTERS************************** */



    /**
     * Get the value of id
     */
    public function customerId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setCustomerId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of pseudo
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set the value of pseudo
     *
     * @return  self
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    
}
