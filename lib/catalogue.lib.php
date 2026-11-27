
<?php 


function obtenirTheme($cnx){
return lire($cnx, "SELECT * FROM theme");
}


function obtenirProduits($cnx, $filtre,$tri)
{
    // tri pas valeur donner 
    $tri = in_array($tri, ["prix DESC", "prix ASC", "nom DESC", "nom ASC", 
    "dac DESC", "ventes DESC"])  ? $tri : "RAND()";
    $clausewhere = $filtre == "tous"? "" : " WHERE thm_id=? ";
    $params = ($filtre == "tous") ? [] : [$filtre];
return lire($cnx, "SELECT * FROM produit $clausewhere ORDER BY $tri", $params);

}

