

/* Todo#1 menu burger*/

// Fonction pour ouvrir et fermer le menu et ajout de class open pour le menu burger




function openMenu() {
    // je récupère les classes dont j'ai besoin
    // let header = document.querySelector('.header');
    let navbar = document.querySelector('.navbar');
    let burger = document.querySelector('.hamburger_bloc');
    //J'initialise une variable bouléene en false
    let menuOpen = false;

    burger.addEventListener('click', () => {


        navbar.classList.toggle('open_nav');
        // quand le menuOpen n'est pas false on ajoute la classe 'open'
        if (!menuOpen) {
            burger.classList.add('open');
            menuOpen = true;
        } else {
            // sinon on la retire
            burger.classList.remove('open');
            menuOpen = false;
        }

        // header.classList.toggle('open');

    })
}





openMenu();


function closeMenu() {
    let nav_menu = document.querySelector('.nav_items');
    let burger = document.querySelector('.hamburger_bloc');

    burger.addEventListener('click', () => {
        nav_menu.classList.toggle('open_nav');
       

    })

}
closeMenu();












/* TODO#2 faire apparraitre la désignation de la catégorie avec le bouton de lien au milieu de l'image de la gallery */