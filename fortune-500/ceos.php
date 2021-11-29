<?php
include 'init/init.php';

$values->title = 'CEOS';
$values->heading = 'CEOS';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);