<?php snippet('header') ?>

<!-- annuaire.php -->

<?= $page->title() ?>

<main id="annuaire-container">
<ul id="annuaire">
	<li>
		<span class="annee">Année</span>
		<span class="groupe">Groupe</span>
		<span class="nom">Nom</span>
		<span class="url">Site</span>
	</li>
<?php 

$promos = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc");

foreach($promos as $promo) :
?>

<!-- <li><?= $promo->title(); ?> -->

	<!-- <ul> -->
	<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

	<li data-url="<?= $etudiant->url() ?>">
		<span class="annee"><?= $etudiant->parent()->title()->text() ?></span>
		<span class="groupe"><?php snippet('groupe-mention', ['etudiant' => $etudiant])?></span>
		<span class="nom"><!--<a href="<?= $etudiant->url() ?>">--><?= $etudiant->prenom().' '.$etudiant->title() ?><!--</a>--></span>
		<span class="url"><?php snippet('clean-url', ['url' => $etudiant->weburl()->value(), 'target'=>true ])?></span>
		<div class="content"></div>
	</li>

	<!-- <li><a href="<?= $etudiant->url() ?>"><?= $etudiant->prenom().' '.$etudiant->title() ?></a></li> -->

	<?php endforeach; ?>
	<!-- </ul> -->

<!-- </li> -->


<?php endforeach; ?>

</ul>

</main>
<!-- fin annuaire.php -->

<?php snippet('footer') ?>
