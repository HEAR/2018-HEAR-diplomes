<?php snippet('header') ?>

<!-- home.php -->

<div class="gridimage">

<?php 

// $promo = $site->find('2018');
$promo = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc")->first();

?>

<!-- <li><?= $promo->title(); ?> -->

	<ul>
	<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

	

	<li class="">
		<a href="<?= $etudiant->url() ?>">
			<figure>
			<?php foreach ($etudiant->images() as $image) : ?>
	  		<?= $image->resize(null,130)->html() ?>
	  		<?php break; endforeach; ?>
	  		</figure>

			<!-- <p class="nom"><?= $etudiant->prenom().' '.$etudiant->title() ?></p> -->
		</a>
	</li>

	<?php endforeach; ?>
	</ul>

</div>
<!-- fin home.php -->

<?php snippet('footer') ?>
