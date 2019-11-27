<!-- menu.php -->

<nav>
	<ul>
		<!-- <li><a href="annuaire.html">Annuaire</a></li> -->
		<?php foreach( $site->children()->listed() as $page ) : ?>
		<li><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>

<!-- fin menu.php -->