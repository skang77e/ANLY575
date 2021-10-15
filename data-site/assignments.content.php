<?php
$db = new Database();

$sql = 'SELECT `id` FROM `assignments`;';

$assignments = $db->object('Assignment');

$tableStart = "<table>\n<caption>Assignments</caption>\n<tr>\n";
$tableStart .= "<th scope=\"col\">ID</th>\n";
$tableStart .= "<th scope=\"col\">Name</th>\n";
$tableStart .= "<th scope=\"col\">Description</th>\n";
$tableStart .= "<th scope=\"col\">Course ID</th>\n";
$tableStart .= "<th scope=\"col\">Deadline</th>\n";
$tableStart .= "</tr>\n";

$tableEnd = "</table>\n";

$tableData = '';
foreach ($assignments as $assignment) {
	$tableData .= "<tr>\n";
	$tableData .= "<td>{$assignment->id}</td>\n";
	$tableData .= "<td>{$assignment->name}</td>\n";
	$tableData .= "<td>{$assignment->description}</td>\n";
    $tableData .= "<td>{$assignment->course_id}</td>\n";
	$tableData .= "<td>{$assignment->deadline}</td>\n";
	$tableData .= "<td><a href=\"assignment-edit.php?id={$assignment->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
	$tableData .= "<a href=\"assignment-delete.php?id={$assignment->id}\" class=\"icon-button\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
	$tableData .= "</tr>\n";
}

$addContent = "<p><a href=\"assignment-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add course</a></p>";

echo $tableStart . $tableData . $tableEnd . $addContent;
