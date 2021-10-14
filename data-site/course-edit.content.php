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

	//echo 'post';
	if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['description'])) { 
		echo $postError;
		return;
	}
	$updateSql = "UPDATE `courses` SET `name` = \"{$postName}\", `description` = \"{$postDescription}\" WHERE `id` = " . $_GET['id'];
	$update = $db->query($updateSql);
	$sql = 'SELECT * FROM `courses` WHERE `id` = ' . $_POST['id'];
	$course = $db->object('Course', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$course = $course[0];

	$success = "<h2>Course Updated</h2>\n";
	$success .= "<p>Name: " . $course->name . "</p>\n";
	$success .= "<p>Description:" . $course->description . "</p>\n";
	$success .= "<p><a href=\"courses.php\" class=\"button\">Back to course list</a></p>";
	echo $success;
	return;

} 

$sql = 'SELECT * FROM `courses` WHERE `id` = ' . $_GET['id'];

$course = $db->object('Course', $sql);

$formStart = "<form action=\"course-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$data = $course[0];

$form .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">";
$form .= "<p><label for=\"name\">Name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"{$data->name}\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" id=\"description\" value=\"{$data->description}\"></p>";


echo $formStart . $form . $formEnd;
