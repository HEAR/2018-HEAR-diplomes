<?php snippet('header') ?>

<!-- etudiant.php -->

<main class="etudiant">
      <header>
        <h1><?= option('mention')[ $page->mention()->value() ] ?? ucfirst($page->mention()->html()) ?></h1>
        <h2><?= $page->prenom() ?> <?= $page->title() ?></h2>
      </header>
      <div id="content">
        <div class="gauche">
          <!-- <h2>Art-Objet Livre </h2> -->
          <h3>
          Année : <a href="<?= $page->parent()->url() ?>"><?= $page->parent()->title() ?></a> </br>
          <?= Str::replace($page->email()->text(), "@", " at " ) ?></br>
          <a href="<?= $page->weburl()->text()?>" target="_blank"><?= $page->weburl()->text() ?></a></br>
          <?= $page->phone()->text() ?></h3>
          <div class="text fr">
            <?= $page->text_fr()->kt() ?>
          </div>

          <div class="text en">
            <?= $page->text_en()->kt() ?>
          </div>
        </div>
        
        <div class="droite">
          <div class="colonne_droite">

            <?php foreach ($page->images() as $image) : ?>
      
              <figure>
                <?= $image->resize(500,null)->html() ?>
                <figcaption> <?= $image->caption()->text()?></figcaption>
              </figure>
            <?php endforeach; ?>
                      
            
          </div>
        </div>
      </div>
    </main>

<main>


<!-- fin etudiant.php -->


<?php snippet('footer') ?>
