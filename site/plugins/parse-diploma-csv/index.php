<?php

@include_once __DIR__ . '/vendor/autoload.php';

Kirby::plugin('hear/parse-diploma-csv', [
	'hooks' => [
		'page.update:after' => function ($newPage, $oldPage) {
			// throw new Exception('Nope');

			if( $newPage->template() == 'promo' ) :

				// on déclare le parser (l'analyseur)
				$csv = new ParseCsv\Csv();
				// on parse les données (on les analyse, on les filtre)
				$csv->enclose_all = true;
				$csv->parse( $newPage->file()->root() );

				$i = 0;

				$data = "";

				foreach( $csv->data as $key => $ligne ){

					$newPage->createChild([
						'slug'     	=> $ligne['Nom'].'-'.$ligne['Prénom'],
						'template' 	=> 'etudiant',
						'draft' 	=> false,	
						'content' 	=> [
							'title'  => my_mb_ucfirst( $ligne['Nom'] ),
							'prenom' => my_mb_ucfirst( $ligne['Prénom'] )
						]
					]);
					
					
					// $data .= $ligne['Nom']." ".$ligne['Prénom']."\n";
					// $data .= "ok\n";

					$i ++;
					if( $i > 10 ){ break; }
				}

				// $newPage->createChild([
				// 	'slug'     	=> 'aaatest2',
				// 	'template' 	=> 'etudiant',
				// 	'draft' 	=> false,	
				// 	'content' 	=> [
				// 		'title'  => 'AAA Test',
				// 		'author' => 'Homer Simpson',
				// 		'csv'	 => $newPage->file()->root(),
				// 		'parent' => '_drafts/'.$newPage->uri(),
				// 		'text'	 => $data
				// 	]
				// ]);

				// $newPage->file()->delete();

			endif;

		}
	]
]);


function my_mb_ucfirst($str) {
	$str = mb_strtolower($str);
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}
