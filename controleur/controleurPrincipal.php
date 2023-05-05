<?php

function controleurPrincipal(string $objet) : string {
    $lesObjets = array();
    $lesObjets["accueil"] = "controleurAccueil.php";
    $lesObjets["annuaire"] = "controleurAnnuaire.php";
    $lesObjets["authentification"] = "controleurAuthentification.php";

    if (array_key_exists ( $objet , $lesObjets )){
        return $lesObjets[$objet];
    }
    else{
        return $lesObjets["accueil"];
    }

}

?>