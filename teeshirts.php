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

$tri = (isset($_GET['tri'])) ? $_GET['tri'] : 'aleatoire';
//passer valeur de tri a la fonction

// Intégrer le fichier JSON contenant le catalogue des produits
[$theme, $produits] = obtenirCatalogue($page, $langue, $tri);

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
					<?php foreach($themes as $codeTheme => $nomTheme) : ?>
								<option value="<?=$codeTheme;?>"><?= $nomTheme; ?></option>
					<?php endforeach; ?>

				</select>
			</div>
			<div class="tri">
				<label for="tri">Trier par : </label>
				<select name="tri" id="tri">
					<!-- //selected == select pour le browser si tri valeur vas a selected et reste selectironner sur aleatoire, sinon rien -->
					<option <?= ($tri == 'Aleatoire')?' selected ' : ''; ?> value="Aleatoire">Aleatoire</option>
					<option <?= ($tri == 'venteDesc')?' selected ' : ''; ?> value="venteDesc">Meilleur vendeur</option>
					<option <?= ($tri == 'prixAsc')?' selected ' : ''; ?> value="prixAsc">Prix / ascendant</option>
					<option <?= ($tri == 'prixDesc')?' selected ' : ''; ?> value="prixDesc">Prix / descendant</option>
					<!-- deux option albethique martche PASS -->
					<!-- <option <?= ($tri == 'nomAsc')?' selected ' : ''; ?> value="nomAsc">Alpha / ascendant</option>
					<option <?= ($tri == 'nomDesc')?' selected ' : ''; ?> value="nomDesc">Alpha / descendant</option> -->
					<option <?= ($tri == 'dacDesc')?' selected ' : ''; ?> value="dacDesc">Nouveauté</option>
				</select> 
			</div>
		</form>
	</article>
	<article class="principal">
		<!-- Gabarit -->
		<?php foreach ($produits as $prd) : ?>
			<div class="produit">
				<span class="image">
					<img src="images/produits/teeshirts/<?= $prd->id; ?>.webp" alt="<?= $prd->nom->$langue; ?>">
				</span>
				<span class="nom"><?= $prd->nom->$langue; ?></span>
				<span class="prix"><?= $formatteurMontants->formatCurrency($prd->prix, 'CAD'); ?></span>
			</div>
		<?php endforeach; ?>
	</article>
</main>
<?php include('parties-communes/pied2page.php'); ?>