<?php
/** @var stdClass $_ : raccourci pour la section texte de cette page. */
/** @var string $langue : code de la langue active */

//librairie catalogue prdouit
include('lib/catalogue.lib.php');

// Définir la variable $page pour indiquer la page affichée.
$page = 'teeshirts';

// Inclure la partie de haut de la page.
include('parties-communes/entete.php');

//gerer interactoviter filre de tri
//capturer la saisie util

$tri = $_GET['tri'] ?? 'RAND()';
$filtre = $_GET['filtre'] ?? 'tous';
//passer valeur de tri a la fonction

// Intégrer le fichier JSON contenant le catalogue des produits
$themes = obtenirTheme($cnx);
$produits = obtenirProduits($cnx);
// Formatteur des montants d'argent
$formatteurMontants = new NumberFormatter($langue, NumberFormatter::CURRENCY);
/** @var stdClass $_ : raccourci pour la section texte de cette page. */
?>
<main class="page-produits page-teeshirts">
	<article class="amorce">
		<h1><?= $_->titrePage ?></h1>
		<form class="controle">
			<div class="filtre">
				<label for="filtre">Filtrer par thèmes : </label>
				<select name="filtre" id="filtre">
					<option value="tous">Tous les produits</option>
					<?php foreach($themes as $unTheme) : ?>
								<option <?= ($filtre === $unTheme->id) ? 'selected' : ""; ?> value="<?=$unTheme->id;?>"><?= $unTheme->nom; ?></option>
					<?php endforeach; ?>

				</select>
			</div>
			<div class="tri">
				<label for="tri">Trier par : </label>
				<select name="tri" id="tri">
					<!-- //selected == select pour le browser si tri valeur vas a selected et reste selectironner sur aleatoire, sinon rien -->
					<option <?= ($tri == 'RAND()')?' selected ' : ''; ?> value='RAND()'>Aleatoire</option>
					<option <?= ($tri == 'ventes DESC')?' selected ' : ''; ?> value="ventes DESC">Meilleur vendeur</option>
					<option <?= ($tri == 'prix ASC')?' selected ' : ''; ?> value="prix ASC">Prix / ascendant</option>
					<option <?= ($tri == 'prix DESC')?' selected ' : ''; ?> value="prix DESC">Prix / descendant</option>
					<!-- deux option albethique martche PASS -->
					<option <?= ($tri == 'nom ASC')?' selected ' : ''; ?> value="nom ASC">Alpha / ascendant</option>
					<option <?= ($tri == 'nom DESC')?' selected ' : ''; ?> value="nom DESC">Alpha / descendant</option>
					<option <?= ($tri == 'dac DESC')?' selected ' : ''; ?> value="dac DESC">Nouveauté</option>
				</select> 
			</div>
		</form>
	</article>
	<article class="principal">
		<!-- Gabarit -->
		<?php foreach ($produits as $prd) : ?>
			<div class="produit">
				<span class="image">
					<img src="images/produits/teeshirts/<?= ($prd->fichier_image!=="")? $prd->fichier_image : 'vert.png'; ?>
					">
				</span>
				<span class="nom"><?= $prd->nom; ?></span>
				<span class="prix"><?= $formatteurMontants->formatCurrency($prd->prix, 'CAD'); ?></span>
			</div>
		<?php endforeach; ?>
	</article>
</main>
<?php include('parties-communes/pied2page.php'); ?>