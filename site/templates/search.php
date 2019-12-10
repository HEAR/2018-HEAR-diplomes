<?php snippet('header') ?>

<!-- search.php -->

<?= $page->title() ?>

<main id="annuaire-container">
	<ul id="annuaire">
		<li class="filter">
			<span class="annee">Année <button data-tri="asc" class="active">↓</button><button data-tri="desc">↑</button></span>
			<span class="groupe">Groupe <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
			<span class="nom">Nom <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
			<span class="url">Site <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
		</li>


		<?php foreach( $results->sortBy("title") as $etudiant ) : ?>

		<li data-url="<?= $etudiant->url() ?>">
			<span class="annee" data-filter="<?= $etudiant->parent()->title()->text() ?>"><?= $etudiant->parent()->title()->text() ?></span>
			<span class="groupe" data-filter="<?php snippet('groupe-mention', ['etudiant' => $etudiant])?>"><?php snippet('groupe-mention', ['etudiant' => $etudiant])?></span>
			<span class="nom" data-filter="<?= $etudiant->title().' '.$etudiant->prenom() ?>"><!--<a href="<?= $etudiant->url() ?>">--><?= $etudiant->prenom().' '.$etudiant->title() ?><!--</a>--></span>
			<span class="url" data-filter="<?php snippet('filter-url', ['url' => $etudiant->weburl()->value()])?>"><?php snippet('clean-url', ['url' => $etudiant->weburl()->value(), 'target'=>true ])?></span>
			<div class="content"></div>
		</li>


		<?php endforeach; ?>


	</ul>

</main>
<!-- fin search.php -->

<?php snippet('footer') ?>