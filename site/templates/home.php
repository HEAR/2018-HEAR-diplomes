<?php snippet('header') ?>

<!-- home.php -->

<div class="gridimage">
<ul>
<?php 

// $promo = $site->find('2018');
$promo = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc")->first();

//foreach($promos as $promo) :
?>

<!-- <li><?= $promo->title(); ?> -->

	<ul>
	<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

	

	<li>
		<a href="<?= $etudiant->url() ?>">
		<?php foreach ($etudiant->images() as $image) : ?>
  		<?= $image->resize(null,130)->html() ?>
  		<?php break; endforeach; ?>

		<!-- <?= $etudiant->prenom().' '.$etudiant->title() ?> -->
			
		</a>

	</li>

	<?php endforeach; ?>
	</ul>

</li>


<?php //endforeach; ?>

</ul>

</div>
<!-- fin home.php -->

<?php snippet('footer') ?>
