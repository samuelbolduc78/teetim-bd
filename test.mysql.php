<?php 
$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');
$cnx ->select_db('teetim');
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
        <?php while($unproduit = $resultat->fetch_object()): ?>
        <li><?= $unproduit['nom']; ?> (<?= $unproduit->prix; ?>)</li>
        <?php endwhile; ?>
        <!-- assoc petit tableau objet un  -->
    </ul>
</body>
</html>