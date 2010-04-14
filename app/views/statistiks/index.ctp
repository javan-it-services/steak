<h2>Statistik Mahasiswa</h2>
<?php
    echo $flashChart->begin(array('prototype'=>true));    
    $flashChart->setData(array(100000,200000,40000,80000,100000,200000,40000,80000,100000,200000,40000,80000));
     $flashChart->axis('y',array('range' => array(0,200000,1000))); 
    echo $flashChart->pie();
    echo $flashChart->render();
?> 

<?php
/*// Sets height and width
$flashChart->begin(400, 250);
// Title
$flashChart->title('Example 1 - Bars: Hits per Day');
// Configure Grid style and legends
$flashChart->configureGrid(
    array(
        'x_axis' => array(
            'step' => 1,
            'legend' => 'Day'
        ),
        'y_axis' => array(
            'legend' => '#Hits',
        )
    )
);
// Prepare some random data (10 points)
$random_hits = array();
for ($i=0; $i < 10; $i++) { 
    $random_hits[] = rand(10,100);
}
// Register each data set with its information.
$data = array(
    'Hits' => array(
        'color' => '#afe342',
        'font_size' => 11,
        'data' => $random_hits,
        'graph_style' => 'bar',
    )
);
$flashChart->setData($data);

// Set Ranges in the chart
$flashChart->setRange('y', 0, 100);
$flashChart->setRange('x', 0, 10);

// Show the graph
echo $flashChart->render();*/
?> 