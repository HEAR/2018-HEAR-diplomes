<?php snippet('header') ?>

<!-- annuaire.php -->

<?= $page->title() ?>

<ul>
<?php 

$promos = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc");

foreach($promos as $promo) :
?>

<li><?= $promo->title(); ?>

	<ul>
	<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

	<li><a href="<?= $etudiant->url() ?>"><?= $etudiant->prenom().' '.$etudiant->title() ?></a></li>

	<?php endforeach; ?>
	</ul>

</li>


<?php endforeach; ?>

</ul>
<!-- fin annuaire.php -->

<?php snippet('footer') ?>
