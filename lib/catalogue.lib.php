
<?php 


function obtenirTheme($cnx){
return lire($cnx, "SELECT * FROM theme");
}


function obtenirProduits($cnx)
{
return lire($cnx, "SELECT * FROM produit");

}

