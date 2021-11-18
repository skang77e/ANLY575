<?php

include('register.content.php');

$db = new Database();

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['firstname'])) {

	$postFirstname = $_POST['firstname'];
	$postLastname = $_POST['lastname'];
	$postEmail = $_POST['email'];

	if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['email'])) { 
		echo $postError;
		return;
	}

	// Remove user add logic here to prevent duplicated user addition. 

	$success = "<h2>User Created</h2>\n";
	$success .= "<p>First name: {$postFirstname}</p>\n";
	$success .= "<p>Last name: {$postLastname}</p>\n";
	$success .= "<p>Email: {$postEmail}</p>\n";
	$success .= "<p><a href=\"users.php\" class=\"button\">Back to user list</a></p>";
	echo $success;
	return;
}