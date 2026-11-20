
<?php 
///****library code gerer catalogue produuit */

// retoune theme

use LDAP\Result;

function obtenirTheme(){
	$cnx = new mysqli('db', 'teetim', 'teetim', 'teetim');
	$resultat = $cnx -> query("SELECT * FROM theme");
	// return $resultat->fetch_all(MYSQLI_ASSOC);
	$theme = [];
	while($uneLigne = $resultat->fetch_object()){
	$theme[] = $uneLigne;
	}
	return $theme;
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
	$sql = "SELECT * FROM produit $clausewhere ORDER BY $critfiltre";
	$resultat = $cnx -> query($sql);
	$produits = [];
	while ($prod = $resultat->fetch_object()){
		$produits[] = $prod;
	};
	return $produits;
}

