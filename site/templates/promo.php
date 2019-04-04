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

</main>

<!-- fin promo.php -->


<?php snippet('footer') ?>
