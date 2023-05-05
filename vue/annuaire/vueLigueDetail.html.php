<?php
if (isset($laLigue)) {
    ?>
    <h2><?= $laLigue['nom']?>
    <img src="images/<?= $laLigue["logo"] ?>" alt="logo de la ligue" /></h2>
    <br />
    <section>
        <form action="./index.php?objet=annuaire&action=modifier&idLigue=<?= $laLigue['id'] ?>" method="POST">
            <label for="adresse"> Adresse </label>
            <input type="text" name=adresse size=300 value="<?= $laLigue["adresse"] ?>">
            <br />
            <label for="adresse"> Numéro </label>
            <input type="text" name=tel size=300 value="<?= $laLigue["tel"] ?>">
            <br />
            <label for="adresse"> Mail </label>
            <br />
            <input type="text" name=email size=300 value="<?= $laLigue["email"] ?>">
            <br />
            <input type="submit" value="Mettre à jour" /

        </form>
    </section>
<?php
} ?>