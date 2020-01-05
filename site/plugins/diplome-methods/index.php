<?php

// site/plugins/my-methods/index.php
Kirby::plugin('hear/diplome-methods', [
    'fieldMethods' => [
        'optionToText' => function($field) {
            return option( $field->key() )[ $field->value() ] ?? ucfirst($field->html()) ;
        },
        'optionToInit' => function($field) {
            return option( $field->key().'Init' )[ $field->value() ] ?? ucfirst($field->html()) ;
        },
        'prenomToInit' => function($field) {
        	$prenoms = explode( '-', $field->value() );
        	foreach($prenoms as $key => $prenom){
        		$prenoms[$key] = mb_strtoupper( mb_substr($prenom, 0, 1) );
        	}

        	$initiales = implode('.', $prenoms).'. ';

        	return $initiales;
        }
    ]
]);