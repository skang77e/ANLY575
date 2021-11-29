<?php
include 'init/init.php';

$values->title = 'Fortune 500';
$values->heading = 'Fortune 500';
$values->header = 'main.header.template.php';

$page = new Page('main.page.template.php');
$page->render($values, __FILE__);