<!doctype html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1.0">
		<title><?= $site->title() ?> | <?= $page->title() ?></title>
		<?= css([
		'assets/css/reset.css',
		'assets/css/index.css'
		]) ?>
	</head>
	<body>
		<h1><a href="<?= $site->url() ?>"><?= $site->title() ?></a></h1>
		<?php snippet('menu') ?>
		<!-- fin header.php -->