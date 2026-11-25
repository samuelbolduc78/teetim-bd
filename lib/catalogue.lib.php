
<?php 
///****library code gerer catalogue produuit */

// retoune theme

use LDAP\Result;

function obtenirTheme(){
	$test = 3;
	$dsn = "mysql:host=db;dbname=teetim;chartset=utf8mb4";
	$cnx = new PDO($dsn, "teetim", "teetim", [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	]);
	$stmt = $cnx->prepare("SELECT * FROM theme WHERE id>?");
	if ($stmt === false) {
		return false;
	}
	$resultat = $stmt->execute([$test]);
	if($resultat) {
		return $stmt-> fetchAll();
	}
	return [];
}
/**
 * return array tableau avev obj representant theme
 * 
 */

/**
 * retourne teme produit de la cat demander
 * @param string $cat de produit (ex: tessh, ect)
 * @param string $code langue deux lette lagne affichage
 * @param string $critfiltre valeur crit filtre
 * @param string Tableau obj represente produit
 */
function obtenirProduits($categorie, $critfiltre, $critereTri )
{
	$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');
	$clausewhere = $critfiltre === "tous" ? "" : "WHERE thm_id=$critfiltre";
	$sql = "SELECT * FROM produit $clausewhere ORDER BY $critereTri";
	$resultat = $cnx -> query($sql);
	$produits = [];
	while ($prod = $resultat->fetch_object()){
		$produits[] = $prod;
	};
	return $produits;
}

