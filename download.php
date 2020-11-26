<?php

$url = urldecode(filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING));
if(empty($url)){
	die('Nothing to download.');
}
if(substr($url, -4) !== '.pdf'){
	die('Wrong file format.');
}

$filename = basename($url);
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: Binary'); 
header('Content-disposition: attachment; filename="' . $filename . '"'); 
readfile($url);