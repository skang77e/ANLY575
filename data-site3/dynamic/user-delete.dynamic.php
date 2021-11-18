<?php

include '../init/init.php';

$db = new Database();

if (!isset($_GET['id'])) {
	echo "<p>Error: No user selected</p>";
	return;
}
if (!is_numeric($_GET['id'])) {
	echo "<p>Error: The id must be numeric.</p>";
	return;
}

$userSql = "SELECT `firstname`, `lastname`, `email` FROM `users` WHERE `id` = " . $_GET['id'];
$deleteSql = "DELETE FROM `users` WHERE `id` = " . $_GET['id'];
$user = $db->object('User', $userSql);

$success = "<h2>User Deleted</h2>\n";
$success .= "<p>First Name: {$user[0]->firstname} </br>Last Name: {$user[0]->lastname} </br>Email: ({$user[0]->email})</p>\n";

$delete = $db->query($deleteSql);

echo $success;
