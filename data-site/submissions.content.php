<?php
$db = new Database();

$sql = 'SELECT `id` FROM `submissions`;';

$submissions = $db->object('Submission');

$tableStart = "<table>\n<caption>Submission</caption>\n<tr>\n";
$tableStart .= "<th scope=\"col\">ID</th>\n";
$tableStart .= "<th scope=\"col\">User ID</th>\n";
$tableStart .= "<th scope=\"col\">Assignment ID</th>\n";
$tableStart .= "<th scope=\"col\">Datetime</th>\n";
$tableStart .= "<th scope=\"col\">Grade</th>\n";
$tableStart .= "</tr>\n";

$tableEnd = "</table>\n";

$tableData = '';
foreach ($submissions as $submission) {
	$tableData .= "<tr>\n";
	$tableData .= "<td>{$submission->id}</td>\n";
	$tableData .= "<td>{$submission->user_id}</td>\n";
	$tableData .= "<td>{$submission->assignment_id}</td>\n";
	$tableData .= "<td>{$submission->datetime}</td>\n";
	$tableData .= "<td>{$submission->grade}</td>\n";
	$tableData .= "<td><a href=\"submission-edit.php?id={$submission->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
	$tableData .= "<a href=\"submission-delete.php?id={$submission->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
	$tableData .= "</tr>\n";
}

$addContent = "<p><a href=\"submission-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add submission</a></p>";

echo $tableStart . $tableData . $tableEnd . $addContent;