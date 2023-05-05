<?php
session_start ();

if (isset($_SESSION['login']) && isset($_SESSION['pwd'])) {

    // On teste pour voir si nos variables ont bien été enregistrées
    echo '<html>';
    echo '<head>';
    echo '<title>Page de notre section membre</title>';
    echo '</head>';

    echo '<body>';
    echo 'Votre identifiant est '.$_SESSION['login'].'.';
    echo '<br />';

    // On affiche un lien pour fermer notre session
    echo '<a href="./index.php?objet=authentification&action=verifierDeconnexion">Déconnection</a>';
}
else {
    echo 'Les variables ne sont pas déclarées.';
}
?>
