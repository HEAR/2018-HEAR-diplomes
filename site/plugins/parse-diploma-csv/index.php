<?php

@include_once __DIR__ . '/vendor/autoload.php';





Kirby::plugin('hear/parse-diploma-csv', [
	'hooks' => [
		'page.update:after' => function ($newPage, $oldPage) {
			// throw new Exception('Nope');
			
			$mention['Art'] 					= 'art'; 
			$mention['Art-Objet'] 				= 'art_objet'; 
			$mention['Scénographie'] 			= 'scenographie'; 
			$mention['Communication graphique'] = 'communication_graphique'; 
			$mention['Design graphique'] 		= 'design_graphique'; 
			$mention['Didactique visuelle'] 	= 'didactique_visuelle'; 
			$mention['Illustration'] 			= 'illustration'; 
			$mention['Design'] 					= 'design'; 
			$mention['Design textile'] 			= 'design_textile'; 
			$mention['Musique'] 				= 'musique'; 


			$atelier_groupe['Farmteam & Storytellers']	= 'farmteam';
			$atelier_groupe['Hors-Format']				= 'hors_format';
			$atelier_groupe['La Fabrique']				= 'la_fabrique';
			$atelier_groupe['No Name']					= 'no_name';
			$atelier_groupe['Peinture(s)']				= 'peinture';
			$atelier_groupe['Phonon']					= 'phonon';
			$atelier_groupe['Le Plateau']				= 'le_plateau';
			$atelier_groupe['Bijou']					= 'bijou';
			$atelier_groupe['Bois']						= 'bois';
			$atelier_groupe['Terre/céramique']			= 'terre';
			$atelier_groupe['Verre']					= 'verre';
			$atelier_groupe['Métal']					= 'metal';
			$atelier_groupe['Livre']					= 'livre';


			if( $newPage->template() == 'promo' ) :

				// on déclare le parser (l'analyseur)
				$csv = new ParseCsv\Csv();
				// on parse les données (on les analyse, on les filtre)
				$csv->enclose_all = true;
				$csv->parse( $newPage->file()->root() );

				$i = 0;

				$data = "";

				foreach( $csv->data as $key => $ligne ){

					$date_naissance = explode("/", $ligne['Date de naissance']);

					$newPage->createChild([
						'slug'     				=> $ligne['Nom'].'-'.$ligne['Prénom'],
						'template' 				=> 'etudiant',
						'draft' 				=> false,	
						'content' 				=> [
							'title'  			=> mb_convert_case($ligne['Nom'], MB_CASE_TITLE, "UTF-8"), // my_mb_ucfirst( $ligne['Nom'] ),
							'prenom' 			=> mb_convert_case($ligne['Prénom'], MB_CASE_TITLE, "UTF-8"), //my_mb_ucfirst( $ligne['Prénom'] ),
							'pseudonyme' 		=> $ligne['Pseudonyme*'],
							'date_naissance' 	=> $date_naissance[2].'-'.$date_naissance[1].'-'.$date_naissance[0],
							'ville_naissance' 	=> $ligne['Ville de naissance'],
							'pays_de_naissance' => $ligne['Pays de naissance (si hors France)'],
							'email' 			=> $ligne['Adresse email personelle'],
							'phone' 			=> $ligne['Numéro de téléphone'],
							'weburl' 			=> $ligne['Site internet'],
							'mention' 			=> $mention[ $ligne['Mention du diplôme'] ],
							'atelier_groupe' 	=> !empty($ligne['Atelier']) ? $atelier_groupe[ $ligne['Atelier'] ] : "",
							'text_fr' 			=> str_replace("\n", " ",$ligne['Texte – Catalogue FR']),
							'text_en' 			=> str_replace("\n", " ",$ligne['Texte – Catalogue EN']),
							'sons_videos' 		=> $ligne['Son(s) & vidéo(s) - Web']
						]
					]);
					
					
					// $data .= $ligne['Nom']." ".$ligne['Prénom']."\n";
					// $data .= "ok\n";

					// $i ++;
					// if( $i > 10 ){ break; }
				}

				//  https://www.codexworld.com/how-to/check-website-availability-php-curl/
				//  https://stackoverflow.com/questions/9817046/get-the-site-status-up-or-down

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
    $fc  = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}
