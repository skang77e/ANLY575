<?php
// localhost
if ( ($_SERVER['HTTP_HOST'] == 'localhost:8888') || ($_SERVER['HTTP_HOST'] == '127.0.0.1') ) {
	define("ROOT_PATH", '/Applications/MAMP/htdocs/ANLY575/fortune-500/');
	define("PROTOCOL", 'http://');
	define("DOMAIN", 'localhost:8888/ANLY575/');
	define('DB', array(
		'host' => 'localhost',
		'db'   => 'anly575',
		'user' => 'jon',
		'pass' => 'demo',
		'charset' => 'utf8mb4'
	));
	
} else {
	// public server
	define("ROOT_PATH", '/home/jonkangg/public_html/fortune-500/');
	define("PROTOCOL", 'https://'); // change to https:// if necessary
	define("DOMAIN", 'jonkang.georgetown.domains/');
	define('DB', array(
		'host' => 'localhost',
		'db'   => 'jonkangg_anly575',
		'user' => 'jonkangg_anly575',
		'pass' => 'jonkanganly575',
		'charset' => 'utf8mb4'
	));
}

define("CLASS_PATH", ROOT_PATH . '/classes/');
define("TEMPLATE_PATH", ROOT_PATH . '/templates/');
define("SUBFOLDER", 'fortune-500/');
define("URL_ROOT", PROTOCOL . DOMAIN . SUBFOLDER);
define ('TABLES', array(
	'User' => 'users',
	'CEO' => 'ceo_info',
	'HQ' => 'hq_location',
	'FINANCIAL' => 'key_financials',
	'SECTOR' => 'sec_records'
));