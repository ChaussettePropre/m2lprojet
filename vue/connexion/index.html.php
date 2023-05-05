<?php
    session_start ();
?>
<html>
<head>
    <title>Formulaire d'identification</title>
</head>

<body>
<form action="./index.php?objet=authentification&action=verifierConnexion" method="post">
    Votre login : <input type="text" name="login">
    <br />
    Votre mot de passe : <input type="password" name="pwd"><br />
    <input type="submit" value="Connexion">
</form>

</body>
</html>
<?php
    echo '<a href="./index.php?objet=authentification&action=Deconnexion">Déconnection</a>'
?>
