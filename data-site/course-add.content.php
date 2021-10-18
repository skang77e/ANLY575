<?php
$db = new Database();

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['name'])) {

	$postName = $_POST['name'];
	$postDescription = $_POST['description'];

	if (!isset($_POST['name']) || !isset($_POST['description'])) { 
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `courses` (`name`, `description`) ";
	$insertSql .= " VALUES (\"{$postName}\", \"{$postDescription}\");";
	$insertId = $db->insert($insertSql);
	
	$sql = 'SELECT * FROM `courses` WHERE `id` = ' . $insertId;
	$course = $db->object('Course', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$course = $course[0];

	$success = "<h2>Course Created</h2>\n";
	$success .= "<p>Name: {$course->name}</p>\n";
	$success .= "<p>Description: {$course->description}</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;
} 

$formStart = "<form action=\"course-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$form .= "<p><label for=\"name\">Name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" id=\"description\" value=\"\"></p>";


echo $formStart . $form . $formEnd;
