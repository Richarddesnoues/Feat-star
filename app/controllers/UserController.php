<?php

namespace App\Controllers;

use App\Models\User;


class UserController extends CoreController
{ // récupere les information du parent


    public function loginPage()
    {


        //$tplName = 'user';
        $this->show('user');
        // require_once __DIR__.'/../views/user.tpl.php';
    }





    public function login()
    {
        global $router;
        // On récupère les valeurs des champs des champs du formulaire et je les nettoies avec "htmlspecialchars"
        $email = filter_input(INPUT_POST, htmlspecialchars('email'));
        $password = filter_input(INPUT_POST, htmlspecialchars('password'));

        // On récupère l'utilisateur d'après son adresse email
        $user = User::finByEmail($email);


        // si l'utilisateur existe (donc si $user n'est pas false)
        if ($user) {

            // on vérifie que le mot de passe de l'utilisateur correspond à celui tapé dans le champ
            // la fonction password_verify correspond au hash du mot de passe dans la BDD
            #todo mettre password_verify()
            if ($password == $user->getPassword()) {

                // On stock les infos de l'utilisateur dans sa session (son coffre fort dont la clé est son cookie PHPSESSID)
                $_SESSION['userId'] = $user->getId();
                $_SESSION['connected'] = $user;

                // Une fois connecter on redirige vers la page d'accueil
                header('Location: ' . $router->url(''));
            } else {
                echo "Mauvais mot de passe !";
            }
        } else {
            echo "Adresse email non trouvée !";
        }
    }


    public function logout()
    {
        global $router;
        // On supprime les entrées liées à mon utilisateur dans la session
        unset($_SESSION['userId']);
        unset($_SESSION['connectedUser']);

        header('Location: ' . $router->url('account/login'));
    }



    public function registerUserPage()
    {
        $this->show('registerUser');
    }


    public function registerUser()
    {
       
        global $router;
        

        // On récupère les valeurs de nos champs
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'password');
        $passwordVerif = filter_input(INPUT_POST, 'password_verif');
        $pseudo=filter_input(INPUT_POST, 'pseudo');

        


        // On vérifie que tous les champs sont bien remplis en bouclant sur ceux-ci
        foreach ($_POST as $field) {
            // Si un champ est vide
            if (empty($field)) {

            
                // Puis on arrete la boucle (pas besoin de continuer, on sait qu'au moins des champs est vide).
                break;
            }
        }

        // On vérifie que le mot de passe et sa vérification sont identiques
        if ($password != $passwordVerif) {
            $err_mdp = "Le mot de passe et sa confirmation ne sont pas identiques !";
        }
        

        // On vérifie que l'email a le bon format
        $emailValidated = filter_var($email, FILTER_VALIDATE_EMAIL);


        // Si l'email n'est pas valide, alors on stocke un nouveau message d'erreur.
        if (!$emailValidated) {
            echo "L'adresse email n'est pas valide !";
        }




        $newUser = new User();

        $newUser->setEmail($email);
        $newUser->setPassword($password);
        $newUser->setPseudo($pseudo);


        
        // On procède au hash du mot de passe
        $hashedPassword = password_hash($newUser->getPassword(), PASSWORD_DEFAULT);
        // Puis on sauvegarde le mot de passe hashé dans notre propriété Password
        $newUser->setPassword($hashedPassword);
        // On peut sauvegarder l'utilisateur.
        
        if (!$newUser->insert()) {
            exit();


        }
      
        // On redirige l'utilisateur vers cette page
        header('Location: ' . $router->url(''));
        
        
    }
}
