<!doctype html>
<html lang="fr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="icon" href="<?= $site->url() ?>/assets/img/favicon.bmp">

  <title><?= $page->title() ?> | <?= $site->title() ?></title>

  <?= css([
  	'//fonts.googleapis.com/css?family=Michroma&display=swap',
  	'//fonts.googleapis.com/css?family=Roboto:300&display=swap',
  	'assets/css/reset.css',
  	'assets/css/main.css?v=0.11'
  	]) ?>

  <?= js([
  	'assets/js/jquery-3.4.1.min.js',
  	'assets/js/script.js?v=0.11'
  	]) ?>


</head>
<body class="<?php echo $page->slug() ?>">

	<header id="entete">

		<h1 id="logo"><a href="<?= $site->url() ?>">Hear&nbsp;diplomes</a></h1>

		<?php snippet('menu') ?>
		

		<p class="url"><a href="http://www.hear.fr">hear.fr</a></p>
		<form class="search-form" action="<?= $site->page('search')->url() ?>">
				<?php 

				if(!isset( $query ) ){
					$query = "";
				}

				?>
				<input type="text" id="search" name="q"  placeholder="recherche" value="<?= html($query) ?>">
		</form>
	</header>





<!-- fin header.php -->