
<?php 
///****library code gerer catalogue produuit */

/**
 * retourne teme produit de la cat demander
 * @param string $cat de produit (ex: tessh, ect)
 * @param string $code langue deux lette lagne affichage
 */
function obtenirCatalogue($categorie, $codeLange, $critereTri ){
    // Inclure la partie de haut de la page.

// Intégrer le fichier JSON contenant le catalogue des produits
$catalogue = json_decode(file_get_contents("data/$categorie.json"));

// Initialiser deux tableaux 
$themes = [];
$produits = [];

foreach ($catalogue as $codeTheme => $detailTheme) {
	// echo "<p>Le code du thème est $codeTheme</p>\n";
	// print_r($detailTheme);
	$themes[$codeTheme] = $detailTheme->theme->$codeLange;
	//tableau des theme

	//tableau des produits
	$produits = array_merge($produits, $detailTheme->produits);
	//valeur complex, plus que une and shiiii, ya des objet genre
	//fonction rappel, comparaoison, callable, regle decider 2 valeur dans tableau
	//return true

}
if(function_exists($critereTri)){
usort($produits, $critereTri);
}else {
shuffle($produits);
};
//trier avec fonc comparaison ha!

return [$themes, $produits];


}
/**
 * fonction de comparaion des prix descendant des produits
 * @param stdClass $prd1 objet correspondant premier produit a comaprer
 * @param stdClass $prd2 objet correspondant deuxieme produit a comaprer
 * @return int nb entier positif, negatif, ou 0 selon la comparaison

 * 
 */
function prixDesc($prd2, $prd1){
// if($prd2->prix > $prd1->prix){
// return 1;
// }elseif($prd2->prix < $prd1->prix)
// {
// return -1; //flipper

// }else{
// return 0; //rien faire
// };

 return 100*$prd2->prix - 100*$prd1->prix; // donc cela flip a -1 (-280) et flib les produit de place et fait x100 pour comparer des nombre whole, produit 1 - produit 2 = soit 0, soit -0 ou +0 
}
/**
 * fonction de comparaion des prix ascendant des produits
 * @param stdClass $prd1 objet correspondant premier produit a comaprer
 * @param stdClass $prd2 objet correspondant deuxieme produit a comaprer
 * @return int nb entier positif, negatif, ou 0 selon la comparaison

 * 
 */
function prixAsc($prd2, $prd1){
// if($prd2->prix > $prd1->prix){
// return 1;
// }elseif($prd2->prix < $prd1->prix)
// {
// return -1; //flipper

// }else{
// return 0; //rien faire
// };

 return 100*$prd1->prix - 100*$prd2->prix; // donc cela flip a -1 (-280) et flib les produit de place et fait x100 pour comparer des nombre whole, produit 1 - produit 2 = soit 0, soit -0 ou +0 
}
/**
 * fonction de comparaion des vente ascendant des produits
 * @param stdClass $prd1 objet correspondant premier produit a comaprer
 * @param stdClass $prd2 objet correspondant deuxieme produit a comaprer
 * @return int nb entier positif, negatif, ou 0 selon la comparaison

 * 
 */
function venteDesc($prd2, $prd1){
// if($prd2->prix > $prd1->prix){
// return 1;
// }elseif($prd2->prix < $prd1->prix)
// {
// return -1; //flipper

// }else{
// return 0; //rien faire
// };

 return $prd1->ventes - $prd2->ventes; // donc cela flip a -1 (-280) et flib les produit de place et fait x100 pour comparer des nombre whole, produit 1 - produit 2 = soit 0, soit -0 ou +0 
}
/**
 * fonction de comparaion des dac catalogue ascendant des produits
 * @param stdClass $prd1 objet correspondant premier produit a comaprer
 * @param stdClass $prd2 objet correspondant deuxieme produit a comaprer
 * @return int nb entier positif, negatif, ou 0 selon la comparaison

 * 
 */
function dacDesc($prd2, $prd1){

// donc cela flip a -1 (-280) et flib les produit de place et fait x100 pour comparer des nombre whole, produit 1 - produit 2 = soit 0, soit -0 ou +0 
if($prd2->dac > $prd1->dac)
	{
		return 1;
	}else if($prd2->dac < $prd1->dac){
		return -1;
	}else{
		return 0;
	}

//  return $prd1->ventes - $prd2->ventes; 

}

