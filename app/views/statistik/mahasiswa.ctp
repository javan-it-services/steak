<h2>Statistik Mahasiswa</h2>
<?php
    echo $flashChart->begin(array('prototype'=>true));    
    $flashChart->setData(array(100000,200000,40000,80000,100000,200000,40000,80000,100000,200000,40000,80000));
     $flashChart->axis('y',array('range' => array(0,200000,1000))); 
    echo $flashChart->pie();
    echo $flashChart->render();
?> 