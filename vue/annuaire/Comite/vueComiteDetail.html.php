<?php
if (isset($leComite)) {
    ?>
    <h2><?= $leComite['nom']?>
        <img src="images/<?= $leComite["nomfichier"] ?>" alt="logo du Comite" /></h2>
    <br />
    <section>
        <form action="./index.php?objet=annuaire&action=modifier&idComite=<?= $leComite['idComite'] ?>" method="POST">
            <label for="adresse"> Adresse </label>
            <input type="text" name=adresse size=300 value="<?= $leComite["adresse"] ?>">
            <br />
            <input type="text" name=adresse size=300 value="<?= $leComite["nom"] ?>">
            <br />
            <input type="submit" value="Mettre à jour" />
        </form>
    </section>

    <?php
} ?>


