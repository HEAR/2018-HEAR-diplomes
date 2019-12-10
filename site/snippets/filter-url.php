<?php

$url = strpos($url, 'http') !== 0 ? "http://$url" : $url;

if(filter_var($url, FILTER_VALIDATE_URL)) {
	$filter = str_replace( 'www.', '', str_replace( ['http://','https://'] ,'' , $url) );
    echo $filter;
} 
