<?php

include("parsecsv-for-php/parsecsv.lib.php");


// on déclare le parser (l'analyseur)
$csv = new ParseCsv\Csv();
// $csv->encoding('UTF-16', 'UTF-8');
// $csv->delimiter = ";";
// on parse les données (on les analyse, on les filtre)
$csv->enclose_all = true;
$csv->parse('diplomes-2018.csv');


$mention['Art'] 					= 'art'; 
$mention['Art objet'] 				= 'art_objet'; 
$mention['Scénographie'] 			= 'scenographie'; 
$mention['Communication graphique'] = 'communication_graphique'; 
$mention['Didactique visuelle'] 	= 'didactique_visuelle'; 
$mention['Illustration'] 			= 'illustration'; 
$mention['Design'] 					= 'design'; 
$mention['Design textile'] 			= 'design_textile'; 
$mention['Musique'] 				= 'musique'; 



$atelier_groupe['Farmteam / Storyteller']	= 'farmteam';
$atelier_groupe['Hors format']				= 'hors_format';
$atelier_groupe['La fabrique']				= 'la_fabrique';
$atelier_groupe['No Name']					= 'no_name';
$atelier_groupe['Peinture(s)']				= 'peinture';
$atelier_groupe['Phonon']					= 'phonon';
$atelier_groupe['Le plateau']				= 'le_plateau';
$atelier_groupe['Bijoux']					= 'bijoux';
$atelier_groupe['Bois']						= 'bois';
$atelier_groupe['Terre']					= 'terre';
$atelier_groupe['Verre']					= 'verre';
$atelier_groupe['Métal']					= 'metal';
$atelier_groupe['Livre']					= 'livre';


foreach( $csv->data as $key => $ligne ){

	$fiche = array();

	$date_naissance = explode(" ", $ligne['Date de naissance']);
	$ligne['Nom'] = str_replace("--", "-", $ligne['Nom']);

	// ($key+1) . "_" .
	$dirname = ($key+1) . "_" .( str_replace(" ", "-", _slugify($ligne['Nom'].' '.$ligne['Prénom']) ) );


	echo $dirname."\n";


	$fiche["Title"] 			= "Title: "				.my_mb_ucfirst($ligne['Nom']);
	$fiche["Prenom"] 			= "Prenom: "			.my_mb_ucfirst($ligne['Prénom']);
	$fiche["Pseudonyme"] 		= "Pseudonyme: "		.$ligne['Pseudonyme*'];
	$fiche["Date-naissance"] 	= "Date-naissance: "	.$date_naissance[2].'-'.$date_naissance[1].'-'.$date_naissance[0];
	$fiche["Ville-naissance"] 	= "Ville-naissance: "	.$ligne['Ville de naissance'];
	$fiche["Pays-de-naissance"] = "Pays-de-naissance: "	.$ligne['Pays de naissance (si hors France)']; 
	$fiche["Email"] 			= "Email: "				.$ligne['Adresse email personelle']; 
	$fiche["Phone"] 			= "Phone: "				.$ligne['Numéro de téléphone'];
	$fiche["Site"] 				= "Site: "				.$ligne['Site internet'];
	$fiche["Mention"] 			= "Mention: "			.$mention[ $ligne['Mention du diplôme'] ];
	$fiche["Atelier-groupe"] 	= "Atelier-groupe: "	.$atelier_groupe[ $ligne['Atelier'] ]; 
	$fiche["Text-fr"] 			= "Text-fr: "			.str_replace("\n", " ",$ligne['Texte – Catalogue FR']);
	// $fiche["Images"] 			= $ligne['Nom'];
	$fiche["Text-en"] 			= "Text-en: "			.str_replace("\n", " ",$ligne['Texte – Catalogue EN']);
	$fiche["Sons-videos"] 		= "Sons-videos: "		.$ligne['Son(s) & vidéo(s) - Web']; 

	// print_r($fiche);

	$repertoire = "diplomes/" . $dirname;

	if(!is_dir("diplomes/")){
		mkdir("diplomes/");
	}

	if(!is_dir($repertoire)){
		mkdir( $repertoire );
	}

	file_put_contents($repertoire."/etudiant.txt", implode("\n\n----\n\n",$fiche));



	// break;
}



/**
 * https://stackoverflow.com/a/51991579/9531233
 * @param  string $string [description]
 * @return [type]         [description]
 */
function _slugify(string $string): string
{
    $str = $string; // for comparisons
    $str = _toUtf8($str); // Force to work with string in UTF-8
    $str = iconv('UTF-8', 'ASCII//TRANSLIT', $str);

    if ($str != htmlentities($string, ENT_QUOTES, 'UTF-8')) { // iconv fails
        $str = _toUtf8($string);
        $str = htmlentities($str, ENT_QUOTES, 'UTF-8');
        $str = preg_replace('#&([a-z]{1,2})(acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);#i', '$1', $str);
        // Need to strip non ASCII chars or any other than a-z, A-Z, 0-9...
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        $str = preg_replace(array('#[^0-9a-z]#i', '#[ -]+#'), ' ', $str);
        $str = trim($str, ' -');
    }

    // lowercase
    $string = strtolower($str);

    return $string;
}

function _toUtf8(string $str_in): ?string
{
    if (!function_exists('mb_detect_encoding')) {
        throw new \Exception('The Multi Byte String extension is absent!');
    }
    $str_out = [];
    $words = explode(" ", $str_in);
    foreach ($words as $word) {
        $current_encoding = mb_detect_encoding($word, 'UTF-8, ASCII, ISO-8859-1');
        $str_out[] = mb_convert_encoding($word, 'UTF-8', $current_encoding);
    }
    return implode(" ", $str_out);
}



function my_mb_ucfirst($str) {
	$str = mb_strtolower($str);
    $fc = mb_strtoupper(mb_substr($str, 0, 1));
    return $fc.mb_substr($str, 1);
}
