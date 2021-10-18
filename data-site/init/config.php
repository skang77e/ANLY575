<?php
define("ROOT_PATH", '/Applications/MAMP/htdocs/ANLY575/data-site/');
define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("PROTOCOL", 'http://');
define("DOMAIN", 'localhost:8888/ANLY575/');
define("SUBFOLDER", 'data-site/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
const TABLES = array(
	'User' => 'users',
	'Assignment' => 'assignments',
	'Submission' => 'submissions',
	'Course' => 'courses'
);
const DB = array(
	'host' => 'localhost',
	'db'   => 'anly575',
	'user' => 'jon',
	'pass' => 'demo',
	'charset' => 'utf8mb4'
);