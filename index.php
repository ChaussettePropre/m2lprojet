<?php
include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";

if (isset($_GET["objet"])){
    $objet = $_GET["objet"];
}
else{
    $objet = "accueil";
}

$fichier = controleurPrincipal($objet);
include "$racine/controleur/$fichier";


?>
     