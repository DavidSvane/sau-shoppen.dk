<?php

	$c = preg_replace("/[^a-zA-Z0-9]+/", "", substr(strtolower($_POST['c']),0,6));

	$codes = json_decode(strtolower(file_get_contents('data_ku_codes.json')));

	$ku_urls = array();

	for ($i = 0; $i < count($codes); $i++) {
		if (strpos($codes[$i], $c)) {
			array_push($ku_urls, explode('_____', $codes[$i])[1]);
		}
	}

	echo(json_encode($ku_urls));

?>
