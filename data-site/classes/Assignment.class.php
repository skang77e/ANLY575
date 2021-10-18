<?php
class Assignment extends Base {
	public $id;
	public $name;
	public $description;
	public $course_id;
	public $deadline;

	function __construct() {
	    $this->table = 'pages';
	  }
}