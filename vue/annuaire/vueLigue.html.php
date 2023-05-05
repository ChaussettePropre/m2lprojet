<h1>Annuaire du Grand Est</h1>

<?php
if (isset($lesLigues)) {
    for ($i = 0; $i < count($lesLigues); $i++) {
        ?>
        <div class="card">
            <div class="descrCard"><?php echo "<a href='./index.php?objet=annuaire&action=afficherOne&idLigue=" . $lesLigues[$i]['id'] . "'>" . $lesLigues[$i]['nom'] . "</a>"; ?>
                <br />
                <img src="images/<?= $lesLigues[$i]["logo"] ?>" alt="logo de la ligue" />
                <br />
                <?= $lesLigues[$i]["adresse"] ?>
                <br />
            </div>
        </div>
        <?php
    }
}
?>



