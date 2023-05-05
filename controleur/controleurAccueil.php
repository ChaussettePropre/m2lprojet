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

//gestion des différentes fonctionnalités.
switch($action) {

    case 'afficherPresentation':
        // appel des fonctions permettant de recuperer les donnees utiles a l'affichage
        // affichage de la vue
        include "$racine/vue/accueil/vueAccueil.html.php";
        break;

    case 'afficherServices':

        include "$racine/vue/accueil/vueServicesProposes.html.php";
        break;//A DEVELOPPER

    case 'afficherContact':
        include "$racine/vue/Contact/pagecontact.html.php";
        break;
        
    case 'afficherPlans':
        include "$racine/vue/accueil/vuePlans.html.php";
        break;
}

include "$racine/vue/pied.html.php";

?>