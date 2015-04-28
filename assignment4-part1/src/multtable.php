<?php
	echo '<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8" />
	<title>Multiplacation Table</title>
	</head>
	<body>';
?>

<style type="text/css">
table#muls {
	border: solid 1px black;
	border-collapse: collapse;
	table-layout: fixed;
	text-align: center;
}
#muls td {
	border: solid 1px black;
	width: 40px;
}
</style>

<?php
echo '<table>';

$minMultiplicand = "error";
$maxMultiplicand = "error";
$minMultiplier = "error"; 
$maxMultiplier = "error";

// This tracks all possible errors that would prevent the multiplication table
//		from working
$error = false;

// Validate incoming values are numbers and assign it to a variable if so
foreach($_GET as $key => $value){
	if($key == "min-multiplicand") {
		if(is_numeric($value)) {
			$minMultiplicand = $value;
		} else {
			echo "<div>Min-multiplicand must be an integer.</div><br>";
			$value = $minMultiplicand;
		}
	} else if($key == "max-multiplicand") {
		if(is_numeric($value)) {
			$maxMultiplicand = $value;
		} else {
			echo "<div>Max-multiplicand must be an integer.</div><br>";
			$value = $maxMultiplicand;
		}
	} else if($key == "min-multiplier") {
		if(is_numeric($value)) {
			$minMultiplier = $value;
		} else {
			echo "<div>Min-multiplier must be an integer.</div><br>";
			$value = $minMultiplier;
		}	
	} else if ($key == "max-multiplier") {
		if(is_numeric($value)) {
			$maxMultiplier = $value;
		} else {
			echo "<div>Max-multiplier must be an integer.</div><br>";
			$value = $maxMultiplier;
		}
	}
	if($value == "error") {
		$error = true;
	}

	// Log the incoming $_GET keys and values in a table
	echo '<tr><td>' . $key . '<td>' . $value . '</td>';
}


// Ensure that all of the $_GET values are present needed to create the table
if(!isset($_GET["min-multiplicand"])) {
	echo '<div>Missing parameter min-multiplicand.</div><br>';
	$error = true;
}
if(!isset($_GET["max-multiplicand"])) {
	echo '<div>Missing parameter max-multiplicand.</div><br>';
	$error = true;
}
if(!isset($_GET["min-multiplier"])) {
	echo '<div>Missing parameter min-multiplier.</div><br>';
	$error = true;
}
if(!isset($_GET["max-multiplier"])) {
	echo '<div>Missing parameter max-multiplier.</div><br>';
	$error = true;
}
if(!$error) {
	echo '<div>All parameters present</div><br>';
}

echo '</table>';


// Validate the min/max relationships of the multiplicands and multipliers
if(!$error) {
	if($minMultiplicand > $maxMultiplicand) {
		echo '<br><div>Minimum multiplicand larger than maximum.</div>';
		$error = true;
	}
	if($minMultiplier > $maxMultiplier){
		echo '<br><div>Minimum multiplier larger than maximum.</div>';
		$error = true;
	}
}

// Log an error message to the page if any error persisted
if($error) {
	echo '<br><div>There was an error!</div>';
} else {
	echo '<br><div>No errors with input!</div>';
}

// Only if there was no error, create the multiplication table
if(!$error) {
	echo "<br><br><table id='muls'>";
	echo "<label>Multiplication Table</label>";
	$height = $maxMultiplicand - $minMultiplicand + 2;
	$width = $maxMultiplier - $minMultiplier + 2;
	$mulValue = 0;

	for($i = 0; $i < $height; $i++) {
		echo '<tr>';
		if($i == 0) {
			echo '<td> ';
		}
		$rowLabel = $minMultiplicand + $i - 1;
		if($i != 0) {
			echo "<td>$rowLabel";
		}
		
		for($j = 0; $j < $width; $j++) {
			$colLabel = $minMultiplier + $j - 1;
			if($j != 0) {
				if($i == 0) {
					echo "<td>$colLabel";
				} else {
					$mulValue = $rowLabel * $colLabel;
					echo "<td>$mulValue";
				}	
			}
		}
	}
}
	echo '</body>
	</html>';
?>
