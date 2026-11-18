<?php 
$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');

//ecrire requete sql
$requeteThemeProduit = "SELECT nom, prix FROM produit LIMIT 10"; 

$resultat = $cnx -> query($requeteThemeProduit);

//trouver reponse
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testintegPHPmySQL</title>
</head>
<body>
    <h2> 10 produits </h2>
    <ul>
        <?php while($unroduit = $resultat->fetch_assoc()): ?>
        <li><?= $unroduit['nom']; ?> (<?= $unroduit['prix']; ?>)</li>
        <?php endwhile; ?>
    </ul>
</body>
</html>