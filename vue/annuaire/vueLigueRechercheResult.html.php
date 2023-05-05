<h1>Résultat de la recherche</h1>

<?php
if (isset($lesLigues)) {
    if (sizeof($lesLigues) == 0){
        ?>
        <h3> Aucun résultat ne correspond à votre recherche.s</h3>
        <?php
    }
    else {
        for ($i = 0; $i < count($lesLigues); $i++) {
            ?>
            <div class="card">
                <div class="descrCard"><?php echo "<a href='./index.php?objet=annuaire&action=afficherOne&idLigue=" . $lesLigues[$i]['id'] . "'>" . $lesLigues[$i]['nom'] . "</a>"; ?>
                    <br />
                    <img src="photos/<?= $lesLigues[$i]["nomfichier"] ?>" alt="logo de la ligue" />
                    <br />
                </div>
            </div>
        <?php
        }
    }
}
if (isset($lesComites)) {
    if (sizeof($lesComites) == 0){
        ?>
        <h3> Aucun résultat ne correspond à votre</h3>
        <?php
    }
    else {
        for ($i = 0; $i < count($lesComites); $i++) {
            ?>
            <div class="card">
                <div class="descrCard"><?php echo "<a href='./index.php?objet=annuaire&action=afficherOneComite&idComite=" . $lesComites[$i]['id'] . "'>" . $lesComites[$i]['nom'] . "</a>"; ?>
                    <br />
                    <img src="photos/<?= $lesComites[$i]["nomfichier"] ?>" alt="logo de la ligue" />
                    <br />
                </div>
            </div>
            <?php
        }
    }
}


