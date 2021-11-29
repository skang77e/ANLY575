<?php
$db = new Database();

$sql = '
SELECT 	
    `s`.`id`,
    `s`.`sector` as sector,
    `s`.`company_id`,
    `s`.`num_employee` as num_employee,
    `k`.`company` as company,
    `k`.`revenue` as revenue,
    `k`.`profit` as profit
FROM `sec_records` AS `s`
LEFT JOIN `key_financials` AS `k`
    ON `s`.`company_id` = `k`.`id`
';

// Join sec_records table with key_financials table
$sectors = $db->object('SECTOR', $sql);

$caption = 'Sector Records';
$headers = array('ID', 'Sector', 'Company ID', 'Number of Employees','Company', 'Revenue', 'Profit');
$data = $sectors; // note: this would be an array of rows from a database query

include CLASS_PATH . 'UI.class.php'; // if the UI file has not been included yet
$ui = new UI(); // if the UI class has not been called yet;

// Call tables and dialog
$table = $ui->simpleTable($caption, $headers, $data);

// Prepare data to create bubble chart
$allsectors = array();

// Find sector data from existing table
foreach ($sectors as $sector) {
    $allsectors[] = $sector->sector;
}

// See count for each sectors select 5 sectors
// print("<pre>".print_r((array_count_values($allsectors)),true)."</pre>");
// [Financials] 
// [Energy]
// [Telecommunications]
// [Technology]
// [Health Care]

$financials = array();
$energy = array();
$telecom = array();
$tech = array();
$health = array();

// Iterate sector data and prepare data for each sectors to print bubble chart
foreach($data as $item){
    if($item->sector == 'Telecommunications'){
        $telecom[] = [$item->num_employee, $item->revenue, $item->profit];
    }elseif($item->sector == 'Energy'){
        $energy[] = [$item->num_employee, $item->revenue, $item->profit];
    }elseif($item->sector == 'Technology'){
        $tech[] = [$item->num_employee, $item->revenue, $item->profit];
    }elseif($item->sector == 'Health Care'){
        $health[] = [$item->num_employee, $item->revenue, $item->profit];
    }elseif($item->sector == 'Financials'){
        $financials[] = [$item->num_employee, $item->revenue, $item->profit];
    }
}

// encode to json
$financials_json = json_encode($financials); 
$energy_json = json_encode($energy); 
$telecom_json = json_encode($telecom); 
$tech_json = json_encode($tech); 
$health_json = json_encode($health); 

echo '<p>This page contains data about Fortune 500\'s business sector information.<p>';
echo '<p>From original dataset, I extracted Sector, Number of Employees, and Company ID.</p>';
echo '<p>After that I joined the table from key_finanacials to get company, revenue and profit columns.</p>';
echo '<p>There were total of 21 sectors and out of that I picked 5 sectors (Financials, Energy, Telecommunications, Technology, Health Care) to create 3D bubble chart.</p>';
echo '<p>X-axis represents the number of employees while Y-axis represents revenue. Size of bubble presents profit of the company.</p>';

echo '<div id="bubble-chart"></div>';
echo $table ;

echo "
<script>
Highcharts.chart('bubble-chart', {

    chart: {
      type: 'bubble',
      plotBorderWidth: 1,
      zoomType: 'xy'
    },
  
    title: {
      text: 'Scatter plot of Sectors, Revenue, Employees, and Profit'
    },
    subtitle: {
        text: 'by Financials, Energy, Telecommunications, Technology and Health Care sector'
    },
    xAxis: {
      title: {
        enabled: true,
        text: 'Number of Employees'
      },
        gridLineWidth: 1,
      accessibility: {
        rangeDescription: 'Range: 0 to 100.'
      }
    },
  
    yAxis: {
      title: {
        enabled: true,
        text: 'Revenue (in Million)'
      },

      startOnTick: false,
      endOnTick: false,
      accessibility: {
        rangeDescription: 'Range: 0 to 100.'
      }
    },

    series: [{
      name: 'Financial',
      data: {$financials_json},
      marker: {
        fillColor: {
          radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0.5).get('rgba')]
          ]
        }
      }
    }, 
    {
      name: 'Engergy',
      data: {$energy_json},
      marker: {
        fillColor: {
          radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
          stops: [
            [0, 'rgba(255,255,255,0.5)'],
            [1, Highcharts.color(Highcharts.getOptions().colors[1]).setOpacity(0.5).get('rgba')]
          ]
        }
      }
    },
    {
        name: 'Telecommunications',
        data: {$telecom_json},
        marker: {
            fillColor: {
                radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                stops: [
                    [0, 'rgba(255,255,255,0.5)'],
                    [1, Highcharts.color(Highcharts.getOptions().colors[2]).setOpacity(0.5).get('rgba')]
                ]
            }
        }
    },
    {
        name: 'Technology',
        data: {$tech_json},
        marker: {
            fillColor: {
                radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                stops: [
                    [0, 'rgba(255,255,255,0.5)'],
                    [1, Highcharts.color(Highcharts.getOptions().colors[3]).setOpacity(0.5).get('rgba')]
                ]
            }
        }
    },
    {
        name: 'Health Care',
        data: {$health_json},
        marker: {
            fillColor: {
                radialGradient: { cx: 0.4, cy: 0.3, r: 0.7 },
                stops: [
                    [0, 'rgba(255,255,255,0.5)'],
                    [1, Highcharts.color(Highcharts.getOptions().colors[4]).setOpacity(0.5).get('rgba')]
                ]
            }
        }
    }
    ]
  });
</script>";

?>
