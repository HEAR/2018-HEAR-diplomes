<?php snippet('header') ?>

<!-- annuaire.php -->

<?= $page->title() ?>

<main id="annuaire-container">
	<ul id="annuaire">
		<li class="filter">
			<span class="annee">Année <button data-tri="asc" class="active">↓</button><button data-tri="desc">↑</button></span>
			<span class="groupe">Groupe <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
			<span class="nom">Nom <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
			<span class="url">Site <button data-tri="asc">↓</button><button data-tri="desc">↑</button></span>
		</li>
	<?php 

	$promos = $site->index()->filterBy('template', 'promo')->sortBy("title", "desc");

	foreach($promos as $promo) :
	?>

		<?php foreach( $promo->children()->sortBy("title") as $etudiant ) : ?>

		<?php 
			if( $etudiant->atelier_groupe()->isEmpty() ):
				$groupeMention 	   = $etudiant->mention()->optionToText() ;
				$groupeMentionInit = $etudiant->mention()->optionToInit() ;
			else :
				$groupeMention = $etudiant->mention()->optionToText()." • ".$etudiant->atelier_groupe()->optionToText() ;
				$groupeMentionInit = $etudiant->mention()->optionToInit()."•".$etudiant->atelier_groupe()->optionToInit() ;
			endif;
		 ?>

		<li data-url="<?= $etudiant->url() ?>">
			<span class="annee" data-filter="<?= $etudiant->parent()->title()->text() ?>"><?= $etudiant->parent()->title()->text() ?></span>
			<span class="groupe" data-filter="<?= $groupeMention ?>" data-init="<?= $groupeMentionInit ?>"><?= $groupeMention?></span>
			<span class="nom" data-filter="<?= $etudiant->title().' '.$etudiant->prenom() ?>"><!--<a href="<?= $etudiant->url() ?>">--><?= $etudiant->prenom().' '.$etudiant->title() ?><!--</a>--></span>
			<span class="url" data-filter="<?php snippet('filter-url', ['url' => $etudiant->weburl()->value()])?>"><?php snippet('clean-url', ['url' => $etudiant->weburl()->value(), 'target'=>true ])?></span>
			<div class="content"></div>
		</li>


		<?php endforeach; ?>

	<?php endforeach; ?>

	</ul>

</main>
<!-- fin annuaire.php -->

<?php snippet('footer') ?>
