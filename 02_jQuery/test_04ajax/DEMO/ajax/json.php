<?php
//	Detect Language with Google Translate API
//	Returns JSON
	
	$q = $_GET["q"];
	$url = "http://ajax.googleapis.com/ajax/services/language/detect?v=1.0&q=" . urlencode($q);
	
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$json = curl_exec($ch);
	curl_close($ch);
	
	echo $json;
?>