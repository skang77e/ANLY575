<?php
$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No assignment selected</p>";
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
	$postCourseID = $_POST['course_id'];
	$postDeadline = $_POST['deadline'];

	//echo 'post';
	if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['course_id']) || !isset($_POST['deadline'])) { 
		echo $postError;
		return;
	}
	$updateSql = "UPDATE `assignments` SET `name` = \"{$postName}\", `description` = \"{$postDescription}\", `course_id` = \"{$postCourseID}\", `deadline` = \"{$postDeadline}\" WHERE `id` = " . $_GET['id'];
	$update = $db->query($updateSql);
	
	$sql = 'SELECT 	
		`a`.`id`,
		`a`.`name` as assignment_name,
		`a`.`description`,
		`a`.`deadline`,
		`a`.`course_id`,
		`c`.`name` as course_name
		FROM `assignments` AS `a`
		LEFT JOIN `courses` AS `c`
		ON `a`.`course_id` = `c`.`id`
		WHERE `a`.`id` = ' . $_POST['id'];
	$assignment = $db->object('Assignment', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$assignment = $assignment[0];
	$success = "<h2>Assignment Updated</h2>\n";
	$success .= "<p>Name: " . $assignment->assignment_name . "</p>\n";
	$success .= "<p>Description:" . $assignment->description . "</p>\n";
	$success .= "<p>Course Name:" . $assignment->course_name . "</p>\n";
	$success .= "<p>Deadline:" . $assignment->deadline . "</p>\n";
	$success .= "<p><a href=\"assignments.php\" class=\"button\">Back to assignment list</a></p>";
	echo $success;
	return;
} 

$sql = 'SELECT * FROM `assignments` WHERE `id` = ' . $_GET['id'];

$assignment = $db->object('Assignment', $sql);

$formStart = "<form action=\"assignment-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$data = $assignment[0];

$courses_sql = 'SELECT `id`, `name` FROM `courses`;';
$courses = $db->fetchAll($courses_sql);

$options = '';
foreach ($courses as $course) {
	if($course->id == $data->course_id){
		$options .= "<option value='$course->id' selected>$course->name</option>\n";
	}else{
		$options .= "<option value='$course->id'>$course->name</option>\n";
	}
};

$form .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">";
$form .= "<p><label for=\"name\">Name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"{$data->name}\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" id=\"description\" value=\"{$data->description}\"></p>";
$form .= "<p><label for=\"course_id\">Course ID</label> <select name=\"course_id\" id=\"course_id\">$options</select></p>";
$form .= "<p><label for=\"deadline\">Deadline</label> <input type=\"date\" name=\"deadline\" id=\"deadline\" value=\"{$data->deadline}\"></p>";

echo $formStart . $form . $formEnd;
