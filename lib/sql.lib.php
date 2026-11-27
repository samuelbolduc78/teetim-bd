<?php 
//create focntion sgbdr
//config connect a deplacer dans un endrout secure;
const HOTE = "db";

const UTIL = "teetim";

const MDP = "teetim";

const BD = "teetim";
function connexion(){
$dsn = "mysql:host=".HOTE.";dbname=".BD.";chartset=utf8mb4";
	$cnx = new PDO($dsn, UTIL, MDP, [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
	]);
    return connexion();
};
/**
 * exetcute requert param
 * @param PDO cnx obj connex pdo
 * @param string $req chaine requet sql
 * @param array, tableau valeurs remplaver dans les param (par defaur: tableau vide)
 * @return PDOSTatement un obj conetenant les resultat ou false si la reuqte a echouer
 */
function requete($cnx, $req, $param=[]){
    
$stmt = $cnx->prepare($req);
	if ($stmt === false) {
		return false;
	}
    $resultat = $stmt->execute($param);
    if($resultat){
        return $resultat ? $stmt : false;
    }

};
function creer (){

};
function lire( $cnx, $req, $param=[]){
$res = requete($cnx, $req, $param);
if ($res === false) {
    return [];

}
return $res->fetchAll();
};
function modifier(){

};
function suprrimer(){

;}


; ?>