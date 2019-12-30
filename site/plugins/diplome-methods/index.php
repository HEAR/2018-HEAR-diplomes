<?php

// site/plugins/my-methods/index.php
Kirby::plugin('hear/diplome-methods', [
    'fieldMethods' => [
        'optionToText' => function($field) {
            return option( $field->key() )[ $field->value() ] ?? ucfirst($field->html()) ;
        },
         'optionToInit' => function($field) {
            return option( $field->key().'Init' )[ $field->value() ] ?? ucfirst($field->html()) ;
        }
    ]
]);