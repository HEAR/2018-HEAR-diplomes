<?php snippet('header') ?>

<!-- annuaire.php -->

<?= $page->title() ?>

<main id="annuaire-container">
<ul id="annuaire">
<?php 

$promos = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc");

foreach($promos as $promo) :
?>

<!-- <li><?= $promo->title(); ?> -->

	<!-- <ul> -->
	<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

	<li>
		<span class="annee"><?= $etudiant->parent()->title()->text() ?></span>
		<span class="groupe"><?= option('mention')[ $etudiant->mention()->value() ] ?? ucfirst($etudiant->mention()->html()) ?></span>
		<span class="nom"><a href="<?= $etudiant->url() ?>"><?= $etudiant->prenom().' '.$etudiant->title() ?></a></span>
		<span class="url"><?= $etudiant->weburl()->text() ?></span>
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
