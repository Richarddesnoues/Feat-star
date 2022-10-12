
<?php global $router; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $router->url('assets/css/index.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/icons/fontawesome/css/all.min.css'); ?>">

    <link rel="stylesheet" href="<?= $router->url('assets/css/404.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/contact.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/user.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/cart.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/cgv.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/product.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/category.css'); ?>">
    <link rel="stylesheet" href="<?= $router->url('assets/css/destockage.css'); ?>">





    <title>Feat*</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href="<?= $router->url('') ?>"><img src="<?= $router->url('assets/img/feat-logo-254x87-fluo.png'); ?>" alt="logo du site"></a>
        </div>
        <nav class="navbar">
            <ul class="nav_items">
                <li class="volet_connection">

                    <a href="<?= $router->url('account/login') ?>">Se connecter</a>
                </li>

                <?php $categories = App\Models\Category::findAll();
                foreach ($categories as $cat) {
                    echo '<li class="navItem"><a href="' . $router->url('catalogue/categorie/' . $cat->id) .'"> '.$cat->name.'</a></li>';
                } ?>



                



               

            </ul>
        </nav>
        <div class="connect_cart">
            <div class="login">
                <!-- <div class="user_login"> -->
                <i class="fa fa-user"></i>
                <!-- </div> -->
                <a href='./user'>
                    <p>Connexion</p>
                </a>
            </div>

            <div class="cart">
                <a href='./panier'>
                    <i class="fa-solid fa-cart-shopping"></i><span>0</span>
                    <!-- <p>Mon panier</p> -->
                </a>
            </div>

        </div>
        <!-- ----------------------MENU BURGER--------------- -->
        <div class="hamburger_bloc">
            <div class="hamburger_lines">

            </div>
        </div>

    </div>