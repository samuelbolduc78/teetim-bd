<?php 
// lib fonc utile i18n

// obtient langue dispo sur site 
/**
 * @param array tableau des codes de langue
 * 
 */

function obtenirlangueDisponible(){
    $languesDispo = [];
$contenuI18n = scandir('i18n');
for ($i = 0; $i < count($contenuI18n); $i++) {
	$fichier = $contenuI18n[$i];
	if ($fichier != '.' && $fichier != '..') {
		$languesDispo[] = substr($fichier, 0, 2);
	}
}
return $languesDispo;
} 
/**
 * determine langue active site
 * @param array lagnepermise$ tableau des code des lange dispo
 * @return string code de la langue a 2 lettre 
 */
function determinerlangueSite($languePermise){
    $langue = 'fr';
	
	// 2. Langue mémorisée dans un témoin HTTP
	if(isset($_COOKIE['choixLangue']) && in_array($_COOKIE['choixLangue'], $languePermise)) {
		$langue = $_COOKIE['choixLangue'];
	}
	
	// 3. Langue spécifiée explicitement
	if(isset($_GET['lan']) &&  in_array($_GET['lan'], $languePermise)) {
		$langue = $_GET['lan'];
		setcookie('choixLangue', $langue, time()+30*24*3600);
	}
	return $langue;
}
/**
 * retourne les txt statique de la page designer dans la langue designer par var code langue
 * @param string $codedLangue code de la langue active
 * @param string $nomPage Nom de la page requise
 * @return array tableau des txt staique organiser par section
 * section dans un objet.
 */
function obtenirTXTStatix($codeLange, $nomPage)
{
	/*********************
	Intégration des textes
 *********************/

$textes = json_decode(file_get_contents("i18n/" . $codeLange . ".json"));

return [$textes->entete, $textes->pp, $textes->$nomPage];
/**
 * obtient codee de direction ecriture de la langue e indiquer 
 * @param  string $codelangue code la langue en 2 letrre
 * @return string ....
 */
};
function obtenirDirText($codeLange){
	$directionEcriture = in_array($codeLange, ["ar", "he", "fa", "ur", "dv", "ps", "ku"])
	? 'rtl' : 'ltr';
};
function formaterMontant($codedLangue, $montant){

	// return $montantFormatter;
}

?>