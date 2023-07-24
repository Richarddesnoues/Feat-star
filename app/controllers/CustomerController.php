<?php

namespace App\Controllers;
use App\Models\Customer;

class CustomerController extends CoreController
{ // récupere les information du parent
    public function loginPage()
    {
        //$tplName = 'user';
        $this->show('customer');
        // require_once __DIR__.'/../views/user.tpl.php';
    }

    public function login()
    {
        global $router;
        // On récupère les valeurs des champs des champs du formulaire et je les nettoies avec "htmlspecialchars"
        $email = filter_input(INPUT_POST, htmlspecialchars('email'));
        $password = filter_input(INPUT_POST, htmlspecialchars('password'));

        // On récupère l'utilisateur d'après son adresse email
        $customer = Customer::finByEmail($email);

        // si l'utilisateur existe (donc si $customer n'est pas false)
        if ($customer) {

            // on vérifie que le mot de passe de l'utilisateur correspond à celui tapé dans le champ
            // la fonction password_verify correspond au hash du mot de passe dans la BDD
            #todo mettre password_verify()
            if (password_verify($password, $customer->getPassword())) {

                // On stock les infos de l'utilisateur dans sa session (son coffre fort dont la clé est son cookie PHPSESSID)
                $_SESSION['customerId'] = $customer->getId();
                $_SESSION['connectedCustomer'] = $customer;

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
        unset($_SESSION['customerId']);
        unset($_SESSION['connectedCustomer']);
        header('Location: ' . $router->url('account/login'));
    }

    public function registerCustomerPage()
    {
        
        $this->show('registerCustomer');
    }

    public function registerCustomer()
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
                // On stocke dans la liste des erreurs le message à afficher
                $err_mdp[] = "Tous les champs doivent etre remplis !";
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
            $errorsList[] = "L'adresse email n'est pas valide !";
        }

        $newCustomer = new Customer();
        $newCustomer->setEmail($email);
        $newCustomer->setPassword($password);
        $newCustomer->setPseudo($pseudo);

          // On vérifie que le tableau d'erreurs est vide
          if(empty($errorsList)) {
            // On procède au hash du mot de passe
            $hashedPassword = password_hash($newCustomer->getPassword(), PASSWORD_DEFAULT);
            // Puis on sauvegarde le mot de passe hashé dans notre propriété Password
            $newCustomer->setPassword($hashedPassword);
            // On peut sauvegarder l'utilisateur.
            if($newCustomer->insert()) {
               // On redirige l'utilisateur vers cette page
                header('Location: ' . $router->url(''));
            }    
        } else {
            // On raffiche le formulaire en lui passant notre tableau d'erreurs.
            $this->show('customer', ['errorsList' => $errorsList, 'customer' => $newCustomer]);
        }           
    }
}
