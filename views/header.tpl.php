<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="./assets/icons/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/404.css">
    <link rel="stylesheet" href="./assets/css/gobelet.css">
    <link rel="stylesheet" href="./assets/css/balisages.css">
    <link rel="stylesheet" href="./assets/css/materiel.css">
    <link rel="stylesheet" href="./assets/css/destockage.css">
    <link rel="stylesheet" href="./assets/css/contact.css">
    <link rel="stylesheet" href="./assets/css/user.css">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/cgv.css">


    <title>Feat*</title>
</head>

<body>
    <div class="header">
        <div class="logo">
            <a href='./'><img src="./assets/img/feat-logo-254x87-fluo.png" alt="logo du site"></a>
        </div>
        <nav class="navbar">
            <ul class="nav_items">
                <li class ="navItem <?= $template === 'gobelet' ? 'active' : ''; ?>"> 
                    <a href="./gobelet">Gobelets</a>      
                </li>

                <li class ="navItem <?= $template === 'balisage' ? 'active' : ''; ?>">
                    <a href='./balisage'>Balisage</a>
                </li>

                <li class ="navItem <?= $template === 'materiel' ? 'active' : ''; ?>">
                    <a href='./materiel'>Matériel évenementiel</a>
                </li>

                <li class ="navItem <?= $template === 'destockage' ? 'active' : ''; ?>">
                    <a href='./destockage'>Déstockage</a>
                </li>

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
                <i class="fa-solid fa-cart-shopping"></i>
                <a href='./cart'>
                    <p>Mon panier</p>
                </a>
            </div>

        </div>
        <!-- ----------------------MENU BURGER--------------- -->
        <div class="hamburger_bloc">
            <div class="hamburger_lines">

            </div>
        </div>

    </div>