<?php
	session_start();
	// Delete all session contents/data
	$_SESSION = array();
	// Destroy session cookies
	session_destroy();
	// Get the everything in the file path except for the current file
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	// Combine all elements of the file path (now that the current file has 
	//   been removed)
	$filePath = implode('/', $filePath);
	// Create the variable to which we'll send the page (combined with the file
	//   name in the header function below)
	$redirect = "http://" . $_SERVER['HTTP_HOST'] . $filePath;
	header("Location: {$redirect}/login.php", true);
	die();
?>