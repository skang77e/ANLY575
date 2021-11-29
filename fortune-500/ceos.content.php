<?php
$db = new Database();

$ceos = $db->object('CEO');

$caption = 'CEO Information';
$headers = array('ID', 'CEO Founder', 'CEO Woman', 'Company ID');
$data = $ceos; // note: this would be an array of rows from a database query


include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;

$founder_temp_data = array();
$woman_temp_data = array();

foreach($data as $item){
    $founder_temp_data[] = $item->ceo_founder;
    $woman_temp_data[] = $item->ceo_woman;
}

$founder_temp_data = array_count_values($founder_temp_data);
$woman_temp_data= array_count_values($woman_temp_data);

$founder_yes_per = $founder_temp_data[1] * 2 / 10;
$founder_no_per = $founder_temp_data[0] * 2 / 10;
$woman_yes_per = $woman_temp_data[1] * 2 /10;
$woman_no_per = $woman_temp_data[0] * 2 / 10;

// Call tables and dialog
$table = $ui->simpleTable($caption, $headers, $data);

echo '<div id="pie-chart1"></div>';
echo '<div id="pie-chart2"></div>';

echo $table ;

echo "
<script>
Highcharts.chart('pie-chart1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Is the CEO of the company is also the founder?'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Is the CEO of the company is also the founder?',
        colorByPoint: true,
        data: [{
            name: 'No',
            y: {$founder_no_per},
            sliced: true,
            selected: true
        }, {
            name: 'Yes',
            y: {$founder_yes_per}
        }]
    }]
});

Highcharts.chart('pie-chart2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Is CEO of the company a woman?'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Is CEO of the company a woman?',
        colorByPoint: true,
        data: [{
            name: 'No',
            y: {$woman_no_per},
            sliced: true,
            selected: true
        }, {
            name: 'Yes',
            y: {$woman_yes_per}
        }]
    }]
});

</script>";
?>   

