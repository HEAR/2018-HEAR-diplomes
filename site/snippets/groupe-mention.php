<?php

echo option('mention')[ $etudiant->mention()->value() ] ?? ucfirst($etudiant->mention()->html());

if( $etudiant->mention()->value() == 'art' || $etudiant->mention()->value() == 'art_objet' ) {
	if($etudiant->atelier_groupe()->value() != "" ){
		
		echo " • ";
		echo option('atelier_groupe')[ $etudiant->atelier_groupe()->value() ] ?? ucfirst($etudiant->atelier_groupe()->html());

	}
}