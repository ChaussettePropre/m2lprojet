<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./index.php?objet=annuaire&action=afficherMany","label"=>"Annuaire du sport");
$menuBurger[] = Array("url"=>"./index.php?objet=accueil&action=afficherPresentation","label"=>"Présentation de la M2L");
$menuBurger[] = Array("url"=>"./index.php?objet=accueil&action=afficherServices","label"=>"Services proposés");


$titre = "accueil - M2L.fr";
include "$racine/vue/entete.html.php";

$action="afficherPresentation";
// recuperation de l'action
if (isset($_GET["action"])){
    $action = $_GET["action"];
}

switch($action) {
    case 'afficherConnexion':
        include "$racine/vue/connexion/index.html.php";
        break;

    case 'verifierConnexion':

    // On définit un login et un mot de passe de base pour tester notre exemple. Cependant, vous pouvez très bien interroger votre base de données afin de savoir si le visiteur qui se connecte est bien membre de votre site
        $login_valide = "will";
        $pwd_valide = "wi";
        /*
         * $login_valide = "getUtilisateur";
         * $login_valide = "getPwdByUtilisateur";
         */

    // on teste si nos variables sont définies
        if (isset($_POST['login']) && isset($_POST['pwd'])) {

            if ($login_valide == $_POST['login'] && $pwd_valide == $_POST['pwd']) {

                session_start();
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['pwd'] = $_POST['pwd'];
                var_dump($_SESSION['login']);
                // on redirige notre visiteur vers une page de notre section membre
                header('location: index.php');

            } else {
                // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
                echo '<body onLoad="alert(\'Membre non reconnu...\')">';
                // puis on le redirige vers la page d'accueil
                echo '<meta http-equiv="refresh" content="0;URL=./index.php?objet=authentification&action=afficherConnexion">';
            }
        } else {
            echo 'Les variables du formulaire ne sont pas déclarées.';
        }
        break;

    case 'afficherMembre':
        include "$racine/vue/connexion/page-membre.html.php";
        break;

    case 'Deconnexion':

    // On démarre la session
        session_start();

    // On détruit les variables de notre session
        session_unset();

    // On détruit notre session
        session_destroy();

    // On redirige le visiteur vers la page d'accueil
        header('location: ./index.php?objet=authentification&action=afficherConnexion ');
        break;

}

include "$racine/vue/pied.html.php";

?>
