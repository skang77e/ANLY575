<?php
include 'init/init.php';

$values->title = 'Sector Records';
$values->heading = 'Sector Records';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);