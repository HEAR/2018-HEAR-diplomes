<!-- menu.php -->
<nav>
	<p>Menu : </p>
	<ul>
		<?php foreach( $site->children()->listed() as $page ) : ?>
		<li><a href="<?= $page->url() ?>"><?= $page->title() ?></a></li>
		<?php endforeach; ?>
	</ul>
</nav>
<!-- fin menu.php -->