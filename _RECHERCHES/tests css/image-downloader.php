<?php


// download images


$context = stream_context_create(
    array(
        "http" => array(
            "header" => "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36"
        )
    )
);


$liste = explode("\n", file_get_contents("liste-images-hear.txt") ) ;


// foreach ($liste as $image) {

// 	if( !is_file("images/" . basename( $image ))){
// 		file_put_contents( "images/" . basename( $image ), file_get_contents($image, false, $context));

// 		echo basename( $image )."\n";

// 		sleep(1);
// 	}
// }


$html = "";

foreach ($liste as $image) {

	if( is_file("images/" . basename( $image ))){
		
		$html .= '<img src="images/'.basename( $image ).'">'."\n";

		
	}
}

file_put_contents("liste_image.html", $html);

