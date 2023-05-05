<?php

function connexionPDO() : PDO {
    $login = "lapoele";
    $mdp = "lapoele";
    $bd = "M2L";
    $serveur = "192.168.222.86";

    try {
        $conn = new PDO("pgsql:host=$serveur;dbname=$bd", $login, $mdp);

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        print "Erreur de connexion PDO ";
        die();
    }
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog de test
    header('Content-Type:text/plain');

    echo "connexionPDO() : \n";
    print_r(connexionPDO());
}
?>
