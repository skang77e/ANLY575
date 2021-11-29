<?php
$db = new Database();

$sectors = $db->object('SECTOR');

$caption = 'Sector Records';
$headers = array('ID', 'Sector', 'Company ID', 'Number of Employees');
$data = $sectors; // note: this would be an array of rows from a database query

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;

// Call tables and dialog
$table = $ui->simpleTable($caption, $headers, $data);

// $test = $ui->prepareDataForBubbleChart($data, )
$allsectors = array();

foreach ($sectors as $sector) {
    $allsectors[] = $sector->sector;
}
// print("<pre>".print_r(array_count_values($allsectors),true)."</pre>");
// [Retailing] => 48
// [Energy] => 60
// [Technology] => 44
// [Health Care] => 40
// [Financials] => 90
// [Food, Beverages & Tobacco] => 26
// [Wholesalers] => 21
// [Materials] => 19
// [Industrials] => 18
// [Business Services] => 18

$temp = array();

print("<pre>".print_r($allsectors, true)."</pre>");

// foreach($data as $item){
//     $temp[] = [$item->num_employee, $item->revenue, $item->profit];
// }


// [Telecommunications] => 8
// [Motor Vehicles & Parts] => 11
// [Food & Drug Stores] => 5
// [Aerospace & Defense] => 11
// [Transportation] => 17
// [Media] => 10
// [Household Products] => 11
// [Chemicals] => 13
// [Apparel] => 7
// [Hotels, Restaurants & Leisure] => 10
// [Engineering & Construction] => 12




echo $table;
