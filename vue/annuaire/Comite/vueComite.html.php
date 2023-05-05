<h1><center>Annuaire des Comités du Grand est</center></h1>

<?php
if (isset($lesComites)) {
    for ($i = 0; $i < count($lesComites); $i++) {
        ?>
        <div class="card">
            <div class="descrCard"><?php echo "<a href='./index.php?objet=annuaire&action=afficherOneComite&idComite=" . $lesComites[$i]['id'] . "'>" . $lesComites[$i]['nom'] . "</a>"; ?>
                <br />
                <img src="images/<?= $lesComites[$i]["nomfichier"] ?>" alt="logo du Comité" />
                <br />
                <?= $lesComites[$i]["adresse"] ?>
                <br />
                <?= $lesComites[$i]["tel"] ?>
            </div>
        </div>
        <?php
    }
}
?>

