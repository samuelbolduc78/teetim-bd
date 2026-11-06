<?php 
// tableau simple : pos num/rique
$fruit = ["papmplemousse", "grenade", "kiwi"];
//pos etiquetter (tableau associatif)


//parcourir tebaleau avbev boucle foreach express

foreach($fruit as $unFruits){
echo "<p>$unFruits</p>";
}

$listeGroupe1 = [
    "e24342"=> "marc ant",
    "e234952"=> "jeniou pnt",
    "e53543"=> "splamp gloun",
    "e579264"=> "glougi fligy",

];

foreach($listeGroupe1 as $NoDossier => $nomEtudiant){
    echo "<p> <br/>$nomEtudiant (<i>$NoDossier</i>)</p>";
}

; ?>