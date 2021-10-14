<?php
$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No course selected</p>";
	return;
}
if (!is_numeric($_GET['id'])) {
	echo "<p>Error: The id must be numeric.</p>";
	return;
} else {
	$getId = $_GET['id'];
}

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['id'])) {

	if (!is_numeric($_POST['id'])) {
		echo '<p>Error: the posted id was not numeric.</p>';
		return;
	} else {
		$postId = $_POST['id'];
	}
	$postName = $_POST['name'];
	$postDescription = $_POST['description'];

	if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['description'])) { 
		echo $postError;
		return;
	}
	$deleteSql = "Delete FROM `courses` WHERE `id` = " . $_GET['id'];
	$delete = $db->query($deleteSql);

	$success = "<h2>Course Deleted</h2>\n";
	$success .= "<p>{$postName} {$postDescription}</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `courses` WHERE `id` = ' . $_GET['id'];

$course = $db->object('Course', $sql);

$courseData = '';

$data = $course[0];


$formStart = "<form action=\"course-delete.php?id={$getId}\" method=\"post\">\n";
$courseData .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">\n";
$courseData .= "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"{$data->name}\">\n";
$courseData .= "<input type=\"hidden\" name=\"description\" id=\"description\" value=\"{$data->description}\">\n";
$courseData .= "<p>Are you sure you want to delete {$data->name} {$data->description}?</p>\n";
$confirm = "<p><a href=\"\"><input type=\"submit\" value=\"Delete\"> <a href=\"courses.php\">Back to course list</a></p>\n";
$formEnd = "</form>";

echo $formStart . $courseData . $confirm . $formEnd;
