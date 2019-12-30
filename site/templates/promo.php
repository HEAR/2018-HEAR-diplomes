<?php snippet('header') ?>

<!-- promo.php -->



<main>
  <header class="intro">
    <h1><?= $page->title() ?></h1>
  </header>
  

  <ul>
    <?php foreach( $page->children()->sortBy("title") as $etudiant ) : ?>

      <li><a href="<?= $etudiant->url() ?>"><?= $etudiant->prenom().' '.$etudiant->title() ?></a></li>

    <?php endforeach; ?>
  </ul>

	<p><?php //$page->root() ?></p>
	<p><?php //$page->file()->root() ?></p>
	<p><?= $page->uri() ?></p>
	<p><?= $page->template() ?>	</p>


</main>

<!-- fin promo.php -->


<?php snippet('footer') ?>
