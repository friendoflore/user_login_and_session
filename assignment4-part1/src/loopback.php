<?php
	echo '<DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8" />
	<title>Loop Back</title>
	</head>
	<body>';
	
// I took GET or POST as an inclusive or - I included them both.

$jsonObjectGet;
$jsonObjectPost;

// Set up the JSON Object
$jsonObjectGet["Type"] = "GET";
$jsonObjectPost["Type"] = "POST";
$jsonObjectGet["Parameters"] = array();
$jsonObjectPost["Parameters"] = array();

// Fill the GET object accordingly
if(empty($_GET)) {
	$jsonObjectGet["Parameters"] = null;
} else {
	foreach($_GET as $key => $value) {
		$jsonObjectGet["Parameters"]["$key"] = $value; 
	}
}

// Fill the POST object accordingly
if(empty($_POST)) {
	$jsonObjectPost["Parameters"] = null;
} else {
	foreach($_POST as $key => $value) {
		$jsonObjectPost["Parameters"]["$key"] = $value;
	}
}

$jsonObjectGet = json_encode($jsonObjectGet);
$jsonObjectPost = json_encode($jsonObjectPost);

echo '<h4>GET JSON Object</h4>';
echo $jsonObjectGet;
echo '<h4>POST JSON Object</h4>';
echo $jsonObjectPost;

?>