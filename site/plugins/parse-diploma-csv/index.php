<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('hear/parse-diploma-csv', [
	'hooks' => [
		'page.update:after' => function ($newPage, $oldPage) {
			// throw new Exception('Nope');


			// $page = Page::create([
			// 	'slug'     	=> 'aaatest',
			// 	'template' 	=> 'etudiant',
			// 	'parent' 	=> page( $newPage->uri() ),
			// 	'draft' 	=> false,	
			// 	'content' 	=> [
			// 		'title'  => 'AAA Test',
			// 		'author' => 'Homer Simpson'
			// 	]
			// ]);

		}
	]
]);
