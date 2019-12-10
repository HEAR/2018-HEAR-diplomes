<?php 

// cf https://getkirby.com/docs/guide/templates/content-representations

$images = [];

foreach ($page->images() as $image) : 

	$img = new StdClass;

	$img->image_url 	= $image->resize(500,null)->url();
	$img->image_caption = $image->caption()->value();
	$img->image_alt		= $image->alt()->value();

	$images[] = $img;

endforeach;


$data = [
	'url'		=> $page->url(),
	'annee_url'	=> $page->parent()->url(),
	'annee'		=> $page->parent()->title()->value(),
	'prenom'	=> $page->prenom()->value(),
	'nom'		=> $page->title()->value(),
	'ville'		=> $page->ville_naissance()->value(),
	'telephone'	=> $page->phone()->value(),
	'mail'		=> Str::replace( $page->email()->value() , "@", " at " ),
	'pays'		=> $page->pays_de_naissance()->value(),
	'text_fr'	=> $page->text_fr()->kirbytext()->value(),
	'text_en'	=> $page->text_en()->kirbytext()->value(),
	'images'	=> $images
];

echo json_encode($data);

