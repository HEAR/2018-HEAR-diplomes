<?php

$url = strpos($url, 'http') !== 0 ? "http://$url" : $url;


if(filter_var($url, FILTER_VALIDATE_URL)) {
	$target = $target == true ? " target=\"_blank\"" : "" ;
    echo "<a href=\"$url\"$target>" . str_replace('http://','',$url) . "</a>";
} else {
    //not valid
}
