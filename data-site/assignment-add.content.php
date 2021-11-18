<?php
$db = new Database();

$postError = "<p>Error: form submission was incomplete.</p>\n";

if (isset($_POST['name'])) {

	$postName = $_POST['name'];
	$postDescription = $_POST['description'];
	$postCourseID = $_POST['course_id'];
	$postDeadline = $_POST['deadline'];

	if (!isset($_POST['name']) || !isset($_POST['description']) || !isset($_POST['deadline']) || !isset($_POST['course_id'])) { 
		echo $postError;
		return;
	}
	$insertSql = "INSERT INTO `assignments` (`name`, `description`, `course_id`, `deadline`) ";
	$insertSql .= " VALUES (\"{$postName}\", \"{$postDescription}\", \"{$postCourseID}\", \"{$postDeadline}\");";
	$insertId = $db->insert($insertSql);
	
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
	WHERE `a`.`id` = ' . $insertId;

	$assignment = $db->object('Assignment', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$assignment = $assignment[0];

	$success = "<h2>Assignment Created</h2>\n";
	$success .= "<p>Name: {$assignment->assignment_name}</p>\n";
	$success .= "<p>Description: {$assignment->description}</p>\n";
	$success .= "<p>Course Name: {$assignment->course_name}</p>\n";
	$success .= "<p>Deadline: {$assignment->deadline}</p>\n";
	$success .= "<p><a href=\"assignments.php\" class=\"button\">Back to assignment list</a></p>";
	echo $success;
	return;
} 

$sql = 'SELECT `id`, `name`  FROM `courses`;';
$courses = $db->fetchAll($sql);
$currentDate = date('Y-m-d');

$options = '';
foreach ($courses as $course) {
	$options .= "<option value='$course->id'>$course->name</option>\n";
};

$formStart = "<form action=\"assignment-add.php\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';
$form .= "<p><label for=\"name\">Name</label> <input type=\"text\" name=\"name\" id=\"name\" value=\"\"></p>";
$form .= "<p><label for=\"description\">Description</label> <input type=\"text\" name=\"description\" id=\"description\" value=\"\"></p>";
$form .= "<p><label for=\"course_id\">Course ID</label> <select name=\"course_id\" id=\"course_id\">$options</select></p>";
$form .= "<p><label for=\"deadline\">Deadline</label> <input type=\"date\" name=\"deadline\" id=\"deadline\" value=\"$currentDate\"></p>";

echo $formStart . $form . $formEnd;
