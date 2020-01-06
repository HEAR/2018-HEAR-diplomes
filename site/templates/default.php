<?php snippet('header') ?>
<!-- default.php -->
<main class="default">
	<header class="intro">
		<h1><?= $page->title() ?></h1>
	</header>
	<div class="text">
		<?= $page->text()->kt() ?>
	</div>
</main>
<!-- fin default.php -->
<?php snippet('footer') ?>