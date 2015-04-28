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

		// If the user tried to login with "no" username
		if(($_POST['username'] == "") || ($_POST['username']) == null) {
			echo 'A username must be entered. Click <a href="login.php">here</a> to return to the login screen.';
		} else {
			// Store their name as the current session
			$_SESSION['name'] = $_POST['username'];
		}
	}

	// Clear the session visits to zero if they're not already being recorded
	if(!isset($_SESSION['visits1'])) {
		$_SESSION['visits1'] = 0;
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

		// Increase the page visit counter
		$_SESSION['visits1']++;
		echo "Hello, $_SESSION[name] you have visited this page $_SESSION[visits1] times before.<br>";
		echo 'Click to see <a href="content2.php">more content</a>.<br>';
		// It seemed like the best option to go with a logout page that redirects
		//   to the login page for ease and clarity
		echo "Click <a href=logout.php>here</a> to log out.";
	}
}
	echo '</body>
	</html>';
?>