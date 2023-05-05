<?php

include_once "bd.inc.php";


function getLigues() : array {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from ligue inner join association on ligue.id=association.id");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}


function getComite() : array {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from comite inner join association on comite.id=association.id");
        $req->execute();

        while ($ligne = $req->fetch(PDO::FETCH_ASSOC)) {
            $resultat[] = $ligne;
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getComiteById(int $idComite) : array {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from comite inner join association on comite.id=association.id where comite.id = :idComite");
        $req->bindValue(':idComite', $idComite , PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {echo "getComite() : \n";
    print_r(getLigues());
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getComiteByDiscipline(string $nomDisc) : array {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from comite inner join association on comite.id=association.id inner join discipline on association.iddiscipline=discipline.id where lower(discipline.libelle) like :nomDisc");
        $req->bindValue(':nomDisc', strtolower("%$nomDisc%") , PDO::PARAM_STR);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLigueByDiscipline(string $nomDisc) : array {
    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from ligue inner join association on ligue.id=association.id inner join discipline on association.iddiscipline=discipline.id where lower(discipline.libelle) like :nomDisc");
        $req->bindValue(':nomDisc', strtolower("%$nomDisc%") , PDO::PARAM_STR);
        $req->execute();

        $ligne = $req->fetch(PDO::FETCH_ASSOC);
        while ($ligne) {
            $resultat[] = $ligne;
            $ligne = $req->fetch(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getLigueById(int $idLigue) : array {

    $resultat = array();

    try {
        $cnx = connexionPDO();
        $req = $cnx->prepare("select * from ligue inner join association on ligue.id=association.id where ligue.id = :idLigue");
        $req->bindValue(':idLigue', $idLigue , PDO::PARAM_INT);

        $req->execute();

        $resultat = $req->fetch(PDO::FETCH_ASSOC);

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}




function modifierLigue(int $idLigue, string $adresse) : bool {
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("update ligue inner join association on ligue.id=association.id set adresse=:adresse where id=:idLigue");
        $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);
        $req->bindValue(':id', $idLigue, PDO::PARAM_INT);
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');

    echo "getLigues() : \n";
    print_r(getLigues());

    echo "getComite() : \n";
    print_r(getComite());

    echo "getLigueById(idLigue) : \n";
    print_r(getLigueById(1));

    echo "getLigueByDiscipline(discipline) : \n";
    print_r(getLigueByDiscipline('Judo'));

    echo "modifierLigue(idLigue) : \n";
    print_r(modifierLigue(1,'Nouvelle adresse'));

}
?>