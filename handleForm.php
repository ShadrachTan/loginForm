<?php 

session_start();

// Check if loginBtn exists
if (isset($_POST['loginBtn'])) {
  // Check if the user is already logged in
  if (isset($_SESSION['userName'])) {
      // User is already logged in
      $_SESSION['alertMessage'] = $_SESSION['userName'] . " is already logged in. Please log out first.";
      header('Location: index.php');
      exit(); // Always good to use exit after header redirect
  }

	// Get the username from the form submission
	$userName = $_POST['userName'];

	// Get the hashed password from the form
	$hashedPassword = md5($_POST['userPassword']);

	// Set the session variables
	$_SESSION['userName'] = $userName;
	$_SESSION['hashedPassword'] = $hashedPassword;

	// Redirect back to index.php
	header('Location: index.php');
}

if (isset($_POST['logoutBtn'])) {
  session_unset();
  session_destroy();
  header('Location: index.php');
}

?>
