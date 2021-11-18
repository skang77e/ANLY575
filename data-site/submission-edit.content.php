<?php
$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No submission selected</p>";
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
	$postUserID = $_POST['user_id'];
	$postAssignmentID = $_POST['assignment_id'];
	$postDatetime = $_POST['datetime'];
	$postGrade = $_POST['grade'];

	//echo 'post';
	if (!isset($_POST['id']) || !isset($_POST['user_id']) || !isset($_POST['assignment_id']) || !isset($_POST['datetime']) || !isset($_POST['grade'])) { 
		echo $postError;
		return;
	}
	$updateSql = "UPDATE `submissions` SET `user_id` = \"{$postUserID}\", `assignment_id` = \"{$postAssignmentID}\", `datetime` = \"{$postDatetime}\", `grade` = \"{$postGrade}\" WHERE `id` = " . $_GET['id'];
	$update = $db->query($updateSql);
	$sql = 'SELECT * FROM `submissions` WHERE `id` = ' . $_POST['id'];
	$submission = $db->object('Submission', $sql);

	// the above action returns an array, but we only need one object, so we'll limit the result to the first object
	$submission = $submission[0];

	$success = "<h2>Submission Updated</h2>\n";
	$success .= "<p>User ID: " . $submission->user_id . "</p>\n";
	$success .= "<p>Assignment ID:" . $submission->assignment_id . "</p>\n";
	$success .= "<p>Datetime:" . $submission->datetime . "</p>\n";
	$success .= "<p>Grade:" . $submission->grade . "</p>\n";
	$success .= "<p><a href=\"submissions.php\" class=\"button\">Back to submission list</a></p>";
	echo $success;
	return;
} 

$sql = 'SELECT * FROM `submissions` WHERE `id` = ' . $_GET['id'];

$submission = $db->object('Submission', $sql);

$formStart = "<form action=\"submission-edit.php?id={$getId}\" method=\"post\">\n";
$formEnd = "<p><input type=\"submit\" id=\"submit\"></p>\n</form>\n";
$form = '';

$data = $submission[0];

$user_sql = 'SELECT `id` FROM `users`;';
$user_ids = $db->fetchAll($user_sql);

$assignment_sql = 'SELECT `id` FROM `assignments`;';
$assignment_ids = $db->fetchAll($assignment_sql);

$user_options = '';
foreach ($user_ids as $user_id) {
	if($user_id->id == $data->user_id){
		$user_options .= "<option value='$user_id->id' selected>$user_id->id</option>\n";
	}else{
		$user_options .= "<option value='$user_id->id'>$user_id->id</option>\n";
	}
};

$assignment_options = '';
foreach ($assignment_ids as $assignment_id) {
	if($assignment_id->id == $data->assignment_id){
		$assignment_options .= "<option value='$assignment_id->id' selected>$assignment_id->id</option>\n";
	}else{
		$assignment_options .= "<option value='$assignment_id->id'>$assignment_id->id</option>\n";
	}
};

$form .= "<input type=\"hidden\" name=\"id\" id=\"id\" value=\"{$data->id}\">";
$form .= "<p><label for=\"user_id\">User ID</label> <select name=\"user_id\" id=\"user_id\">$user_options</select></p>";
$form .= "<p><label for=\"assignment_id\">Assignment ID</label> <select name=\"assignment_id\" id=\"assignment_id\">$assignment_options</select></p>";
$form .= "<p><label for=\"datetime\">Datetime</label> <input type=\"date\" name=\"datetime\" id=\"datetime\" value=\"$data->datetime\"></p>";
$form .= "<p><label for=\"grade\">Grade</label> <input type=\"text\" name=\"grade\" id=\"grade\" value=\"$data->grade\"></p>";

echo $formStart . $form . $formEnd;
