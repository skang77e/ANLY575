<?php
class UI extends Base {

	function __construct() {
	  }

	function selectList($id, $name, array $options, $label = null, $required = null, $class = null) {
		if (is_numeric($id[0])) {
			echo ' Error: The ID of the select list must be a letter. It cannot start with a number.';
			return false;
		} elseif (is_numeric($name[0])) {
			echo ' Error: The name of the select list must be a letter. It cannot start with a number.';
			return false;
		}

		if (!$id) {
			echo ' Error: the ID of the select list must not be empty.';
			return;
		} elseif (!$name) {
			echo ' Error: the name of the select list must not be empty.';
			return;
		}

		// You can pass in a CSS class if you want
		$class = null;
		if ($class) {
			$class = ' class = "' . $class . '"';
		}

		if ($label) {
			$label = '<label for = "' . $id . '">' . $label . '</label> ';
		}

		if (($required == 1) || ($required === true)) {
			$required = ' required ';
		}

		$start = '<p><select id="' . $id . '" name="' . $name . '"' . $class . $required . '>' . "\n";
		$end = '</select></p>';

		$optionList = '<option value=""></option>' . "\n";;

		foreach ($options as $k => $v) {
			$optionList .= '<option value="' . $k . '">' . $v . '</option>' . "\n";
		}

		return $label . $start . $optionList . $end;
	}

	// function to prerender table for logged in user
	function prerenderAction(){
		$db = new Database();

		$session = new Session();
		$loggedIn = $session->checkLoginStatus();
		$users = $db->object('User');
		if ($loggedIn) { 

			$tableStart = "<table>\n<caption>&nbsp;</caption>\n<tr>\n";

			$tableStart .= "<th scope=\"col\">Actions</th>\n"; 
			$tableStart .= "</tr>\n";
			$tableEnd = "</table>\n";
			$tableData = '';

			foreach ($users as $user) {
				$tableData .= "<tr data-user-id=\"user-{$user->id}\">\n";
				if ($loggedIn) { 
					$tableData .= "<td><a href=\"user-edit.php?id={$user->id}\" class=\"icon-button\"><i class=\"fas fa-pencil-alt\" role=\"img\" aria-label=\"Edit\"></i></a> ";
					$tableData .= "<a href=\"user-delete.php?id={$user->id}\" class=\"icon-button delete-user\" data-last-name=\"{$user->lastname}\" data-first-name=\"{$user->firstname}\" data-email=\"{$user->email}\" data-dialog-id=\"user-{$user->id}\"><i class=\"far fa-trash-alt\" role=\"img\" aria-label=\"Delete\"></i></a></td>\n";
				}
				$tableData .= "</tr>\n";
			}
			$addUser = '';
			$addUser = "<p><a href=\"user-add.php\" class=\"icon-button\"><i class=\"fas fa-plus-circle\"></i> Add user</a></p>";
		
			return $tableStart . $tableData . $tableEnd . $addUser;
		}
	}

	// function to show simple table of registered users 
	function simpleTable($caption, array $headers, array $data, $attributes = null){
		if (!$caption) {
			echo ' Error: the caption of the table must not be empty.';
			return;
		}

		if (!$headers) {
			echo ' Error: the headers of the table must not be empty.';
			return;
		}
		if (!$data) {
			echo ' Error: the data of the table must not be empty.';
			return;
		}

		// Check for null conditions and assign empty value
		$id = $attributes['id'] ?? '';
		$class = $attributes['class'] ?? '';

		$tableStart = "<table id='{$id}' class='{$class}'>\n<caption>{$caption}</caption>\n<tr>\n";

		foreach ($headers as $header) {
			$tableStart .= "<th scope=\"col\">{$header}</th>\n";
		}
		$tableStart .= "</tr>\n";
		$tableEnd = "</table>\n";

		$tableData = '';
		
		foreach ($data as $row) {
			$tableData .= "<tr>\n";
			foreach($row as $item){
				$tableData .= "<td>{$item}</td>\n";
			}
			$tableData .= "</tr>\n";
		}
		return $tableStart . $tableData . $tableEnd;
	}

	// function to return dialog html
	function dialog() {
		return '<div id="deque-dialog" class="deque-dialog" data-dialog-id>
		<div class="deque-dialog-screen-wrapper"></div>
		<div class="deque-dialog-screen">
		  <h1 id="dialogHeading" class="deque-dialog-heading">Delete User</h1>
		  <p class="deque-dialog-description" id="dialogDescription">Are you sure you want to delete [ <span class="first-name"></span> <span class="last-name"></span> <span class="email"></span> ]?
		  </p>
		  <div class="deque-dialog-buttons">
			<button class="deque-button deque-dialog-button-submit">Delete</button>
			<button class="deque-button deque-dialog-button-cancel">Cancel</button>
			<button class="deque-dialog-button-close" aria-label="Close dialog"><span aria-hidden="true"></span></button>
		  </div>
		</div>
	  </div>
	  ';
	}

	// function prepareDataForBubbleChart(array $data, array $features){
	// 	$temp = array();
	// 	foreach($data as $item){
	// 		foreach($features as $feature){
	// 			$array_name[] = [$item->$feature];
	// 		}
	// 	}
	// 	return $temp;
	// }

	function expandableButton($id, $content, $class) {

	}
}
