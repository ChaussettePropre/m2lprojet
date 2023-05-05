<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.annuaire.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./index.php?objet=annuaire&action=afficherMany","label"=>"Annuaire des ligues");
$menuBurger[] = Array("url"=>"./index.php?objet=annuaire&action=rechercher&critere=discipline","label"=>"Rechercher les ligues avec les discipline sportive");
$menuBurger[] = Array("url"=>"./index.php?objet=annuaire&action=afficherComite","label"=>"Annuaire des comités");

$titre = "Annuaire des ligues";
include "$racine/vue/entete.html.php";

// recuperation de l'action
if (isset($_GET["action"])){
    $action = $_GET["action"];
}

//gestion des différentes fonctionnalités
switch($action) {

    case 'afficherComite':
        //appel des fonctions permettant de récuperer les données utiles à l'affichage des comités
        $lesComites = getComite();
        //affichage de la vue des Comités grâce à vueComite

        include "$racine/vue/annuaire/comite/vueComite.html.php";

    case 'afficherMany':
        // appel des fonctions permettant de recuperer les donnees utiles à l'affichage
        $lesLigues = getLigues();

        // affichage de la vue
        include "$racine/vue/annuaire/vueLigue.html.php";

        break;

    case 'afficherOne':
        //recuperation des donnees GET, POST spécifiques à l'action
        $idLigue=1;
        if (isset($_GET["idLigue"])) {
            $idLigue = $_GET["idLigue"];
        }

        // appel des fonctions permettant de recuperer les donnees utiles à l'affichage
        $laLigue = getLigueById($idLigue);

        // affichage de la vue
        include "$racine/vue/annuaire/vueLigueDetail.html.php";

        break;

    case 'afficherOneComite':
        //recuperation des donnees GET, POST spécifiques à l'action
        $idComite=0;
        if (isset($_GET["idComite"])) {
            $idComite = $_GET["idComite"];
        }

        // appel des fonctions permettant de recuperer les donnees utiles à l'affichage
        $leComite = getComiteById($idComite);

        // affichage de la vue

        include "$racine/vue/annuaire/comite/vueComiteDetail.html.php";


        break;

/*
    case 'modifierComite':
        //recuperation des donnees GET, POST spécifiques à l'action
        $idLigue=0;
        if (isset($_GET["idComite"])) {
            $idLigue = $_GET["idComite"];
        }

        $adresse="";
        if (isset($_POST["adresse"])){
            $adresse = $_POST["adresse"];
        }

        // appel des fonctions permettant de mettre à jour les donnees et de recuperer les donnees utiles
        modifierComite($idLigue,$adresse);
        $laLigue = getComiteById($idLigue);

        // affichage de la vue
        include "$racine/vue/annuaire/vueComiteDetail.html.php";

        break;

*/





    case 'modifier':
        //recuperation des donnees GET, POST spécifiques à l'action
        $idLigue=0;
        if (isset($_GET["idLigue"])) {
            $idLigue = $_GET["idLigue"];
        }

        $adresse="";
        if (isset($_POST["adresse"])){
            $adresse = $_POST["adresse"];
        }

        // appel des fonctions permettant de mettre à jour les donnees et de recuperer les donnees utiles
        modifierLigue($idLigue,$adresse);
        $laLigue = getLigueById($idLigue);

        // affichage de la vue
        include "$racine/vue/annuaire/vueLigueDetail.html.php";

        break;

    case 'rechercher':
        //recuperation des donnees GET, POST spécifiques à l'action
        if (isset($_GET["critere"])){
            $critere = $_GET["critere"];
        }

        //gestion des différents critères de recherche
        switch($critere){
            case 'discipline':
                // recherche par discipline

                //recuperation des donnees POST spécifiques au critère
                $discipline="";
                if (isset($_POST["discipline"])){
                    $discipline = $_POST["discipline"];
                }

                // appel des fonctions permettant de recuperer les donnees utiles a l'affichage
                $lesLigues = getLigueByDiscipline($discipline);
                $lesComites = getComiteByDiscipline($discipline);
                break;

            case '':
                break;
        }

        // appel du script de vue qui permet de gerer l'affichage des donnees
        $titre = "Recherche d'une annuaire";
        include "$racine/vue/annuaire/vueLigueRecherche.html.php";

        if (!empty($_POST)) {
            // affichage des resultats de la recherche
            include "$racine/vue/annuaire/vueLigueRechercheResult.html.php";
        }
        break;
}

include "$racine/vue/pied.html.php";

?>