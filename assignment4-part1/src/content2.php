<?php
	echo '<!DOCTYPE html>
	<html lang="end">
	<head>
	<meta charset="utf-8" />
	<title>Content 1</title>
	</head>
	<body>';
session_start();

if(session_status() == PHP_SESSION_ACTIVE) {

	// If the user has given a username from the login page
	if(isset($_POST['username'])) {
		// If there is a session name recorded as logged in and that name does 
		//   not equal the name just passed in from the login page
		if(isset($_SESSION['name']) && ($_SESSION['name'] != $_POST['username'])) {
			// Clear the old session data
			$_SESSION = array();
		}
	}

	// Clear the session visits to zero if they're not already being recorded
	if(!isset($_SESSION['visits2'])) {
		$_SESSION['visits2'] = 0;
	}

	// If there is no session name on record and there has been no username
	//   given from the login page
	if(!isset($_SESSION['name']) && !isset($_POST['username'])) {
		// Redirect them to the login screen
		header("Location: login.php");
		echo "Redirecting to login...";
	}
	// If there is a name recorded as in a session
	if(isset($_SESSION['name'])) {

		// increase the page visit counter
		$_SESSION['visits2']++;
		echo "Hello, $_SESSION[name] you have visited this more exciting page $_SESSION[visits2] times before.<br>";
		echo 'Click to see <a href="content1.php">prior content</a>.<br>';
		echo "Click <a href=logout.php>here</a> to log out.";
	}
}
	echo '</body>
	</html>';
?>