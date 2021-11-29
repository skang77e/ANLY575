<?php
$db = new Database();

$sql = '
SELECT * from `key_financials`';


$financials = $db->object('FINANCIAL', $sql);

$caption = 'Key Financials';
$headers = array('ID', 'Comapany', 'Rank', 'Revenue', 'Profit', 'Newcomer');
$data = $financials; // note: this would be an array of rows from a database query

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;

// Call tables and dialog
$table = $ui->simpleTable($caption, $headers, $data);



$top20_data = array();

for ($i = 0; $i <= 19; $i++) {
    $top20_data[] = [$data[$i]->company, $data[$i]->revenue];
}

$top20_json = json_encode($top20_data); 

// $test = [
//     ['Shanghai', 24.2],
//     ['Beijing', 20.8],
//     ['Karachi', 14.9],
//     ['Shenzhen', 13.7],
//     ['Guangzhou', 13.1],
//     ['Istanbul', 12.7],
//     ['Mumbai', 12.4],
//     ['Moscow', 12.2],
//     ['São Paulo', 12.0],
//     ['Delhi', 11.7],
//     ['Kinshasa', 11.5],
//     ['Tianjin', 11.2],
//     ['Lahore', 11.1],
//     ['Jakarta', 10.6],
//     ['Dongguan', 10.6],
//     ['Lagos', 10.6],
//     ['Bengaluru', 10.3],
//     ['Seoul', 9.8],
//     ['Foshan', 9.3],
//     ['Tokyo', 9.3]
// ];
// print("<pre>".print_r($top10_data,true)."</pre>");
// print("<pre>".print_r($test,true)."</pre>");

echo '<div id="bar-chart"></div>';
echo $table ;

echo "
<script>
Highcharts.chart('bar-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Top 20 Comanpy in the US by Revenue'
    },
    subtitle: {
        text: 'Source: <a href=\"https://fortune.com/fortune500/2020/search\">fortune.com</a>'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Revenue (millions)'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Revenue in 2021: <b>{point.y:.1f} millions</b>'
    },
    series: [{
        name: 'Revenue',
        data: {$top20_json},
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '11px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>";

?>   

