<?php

$url = strpos($url, 'http') !== 0 ? "http://$url" : $url;


if(filter_var($url, FILTER_VALIDATE_URL)) {
	$target = $target == true ? " target=\"_blank\"" : "" ;
	$filter = "data-filter=\"".str_replace( 'www.', '', str_replace(['http://','https://'],'',$url) ) . "\"";
    echo "<a href=\"$url\"$target$filter>" . str_replace( 'www.', '', str_replace(['http://','https://'],'',$url) ) . "</a>";
} else {
    //not valid
}
