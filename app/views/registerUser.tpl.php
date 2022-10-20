<?php global $router ;?>

<div class="user_bloc">



<section class="user">

    <div class="loginUser">
        <h1>Nouveau client</h1>
    </div>

    <form class="form" action ="<?= $router->url('account/register') ?>" method="POST">
        <div class="form_group">
        <?php if(isset($err_mdp)){echo '<div>'. $err_mdp . '</div>';}?>
            <input type="email" id="email" name="email" placeholder="Saisissez votre adress email..." >
            <input class="email_verif" type="email" name="email_verif"  placeholder="Confirmation Mail" >
            
            <div class="mdp_group">
                
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                <input type="password" name="password_verif"  placeholder="Confirmation mot de passe">
                <input class="pseudo" type ="text" name="pseudo" placeholder="Pseudo">
                <button class="addUser" type="submit"><a href="<?= $router->url('account/register') ?>">Inscription</a></button>
            </div>

            
        
        </div>
    </form>

    <div class="newUser">
        <p>Déjà client ?</p>
        <button type="submit" class="addUser"><a href="<?= $router->url('account/login') ?>">Se connecter</a></button>

        
    </div>



   



</section>
</div>