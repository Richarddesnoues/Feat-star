<?php global $router ;?>


<div class="user_bloc">
<section class="user">
    


    <div class="loginUser">
        <h1>Identifiez vous</h1>
    </div>

    <form class="form" action ="" method="post">
        <div class="form_group">
        
            <input type="email" id="email" name="email" placeholder="Saisissez votre adress email..." >
            <div class="mdp_group">
                
                <input type="password" id="password" name="password" placeholder="Entrez votre mot de passe">
                <div class="mdp">
                    <a href="#"><p>Mot de passe oublié ?</p></a>
                </div>
            </div>
            <input button type="submit" value="Se connecter">
        
        </div>
    </form>

    <div class="newUser">
        <p>Nouveau client ?</p>
        <button class="addUser"><a href="<?= $router->url('account/register') ?>">Créer un compte</a></button>
    </div>



   
    


</section>
</div>