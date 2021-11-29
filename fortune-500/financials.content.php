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

echo '<p>This page contains data about Fortune 500\'s business key financial information.<p>';
echo '<p>From original dataset, I extracted Company Name, Rank, Revenue, Profit, and Newcomer.</p>';
echo '<p>Out of 500 comapanies that I picked top 20 companies by revenue to create bar chart.</p>';
echo '<p>X-axis represents the name of company while Y-axis represents revenue.</p>';

echo '<div id="bar-chart"></div>';
echo $table ;

echo "
<script>
Highcharts.chart('bar-chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Top 20 Companies in the US by Revenue'
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

