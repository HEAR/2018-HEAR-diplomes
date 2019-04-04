<?php snippet('header') ?>

<!-- etudiant.php -->

<main>
	<p>Année : <a href="<?= $page->parent()->url() ?>"><?= $page->parent()->title() ?></a></p>

  <header class="intro">
    <h2><?= $page->prenom() ?> <?= $page->title() ?></h2>
  </header>
  <div class="text">
    <?= $page->text_fr()->kt() ?>
  </div>

  <div class="text">
    <?= $page->text_en()->kt() ?>
  </div>


  <div class="gallery">
  	
  	<?php foreach ($page->images() as $image) : ?>
  		
  		<figure>
  		<?= $image->resize(500,null)->html() ?>
  		</figure>
  	<?php endforeach; ?>

  </div>

</main>

<!-- fin etudiant.php -->


<?php snippet('footer') ?>
