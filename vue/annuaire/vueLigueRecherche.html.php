<form action="./index.php?objet=annuaire&action=rechercher&critere=<?= $critere ?>" method="POST">

    <?php
    switch ($critere) {
        case "discipline": //cas d'une recherche selon la discipline
            ?>
            <h2> Rechercher une Ligue ou un Comité avec une discipline</h2>
            <input type="text" name="discipline" placeholder="discipline" value="Saisir la discipline" onfocus="this.value=''"/><br />

            <?php
            break;

        case "":
            ?>
            <?php
            break;
    }
    ?>
    <br />
    <br />
    <input type="submit" value="Rechercher" />

</form>
