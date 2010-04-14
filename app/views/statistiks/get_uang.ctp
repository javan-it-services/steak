<?php $currency_format['indonesia'] = array('places'=>2, 'before'=>'Rp ', 'thousands'=>'.', 'decimals'=>',') ?>

<table class="Design">
    <thead>
    <?php foreach($tstatuspembayarans as $tstatus):?>
    <tr>
        <td>Jumlah Uang yang seharusnya</td>
		<td  align='right'><?php echo $number->format($tstatus['0']['jumlah_seharusnya'], $currency_format['indonesia'])?></td>
    </tr>
    <tr>
	    <td>Jumlah Uang Masuk</td>
		<td  align='right'><?php echo $number->format($tstatus['0']['jumlah_masuk'], $currency_format['indonesia'])?></td>
    </tr>

    <tr>
		<td>Kekurangan</td>
		<td align='right'><?php echo $number->format( ($tstatus['0']['jumlah_seharusnya'] - $tstatus['0']['jumlah_masuk']) , $currency_format['indonesia']);?></td>
    </tr>

    <?php
    endforeach;?>
    </thead>
</table>
<table width="50%" class="Design">
<thead>
<?

?>

	<tr>
		<th>
			Status
		</th>
		<th>
			Jumlah
		</th>
	</tr>
	<tr>
	<td>
		Bayar Lunas
	</td>
	<td>
	<?

		if(!isset($status_lunas['0']['0']['jml'])){
			echo "Kosong";
		}else{
			echo $status_lunas['0']['0']['jml'];
		}
	?>
	</td>
	</tr>
<tr>
	<td>
		Belum Lunas
	</td>
	<td>
	<? echo $status_blm_lunas['0']['0']['jml']?>
	</td>
	</tr>
<tr>
	<td>
		Belum bayar
	</td>
	<td>
	<? echo $status_blm_bayar['0']['0']['jml']?>
	</td>
	</tr>
	</thead>
</table>
<h2>Statistik Keuangan</h2>
<?php
/*if(!isset($status_lunas['0']['0']['jml'])){
	echo "kosong";
}else{
	$byr_lns = ($status_lunas['0']['0']['jml'] * 100) / 100 ;
}

$byr_blm_lns = ($status_blm_lunas['0']['0']['jml'] * 100) / 100 ;
$blm_byr = ($status_blm_bayar['0']['0']['jml'] * 100) / 100 ;*/

   /* echo $flashChart->begin(array('prototype'=>true));
    echo $flashChart->setData(array($byr_blm_lns,$byr_lns,$blm_byr));
    echo $flashChart->axis('y',array('range' => array(0,200000,1000)));
    echo $flashChart->pie();
    echo $flashChart->render();*/

 /*	     echo $flashChart->begin(array('prototype'=>true));

        $flashChart->setData(array(3,4,6,9),'{n}',false,'Potatoes');
        $flashChart->setTitle('Veggies');
        echo $flashChart->chart('line',array('colour'=>'#cc3355'),'Potatoes');
        echo $flashChart->render();

        $flashChart->setTitle('Data Statistik Mahasiswa');
        $flashChart->setData(array(15,40,60,10),'{n}',false,'Laki-laki','dig');
        $flashChart->setData(array(15,40,60,10),'{n}',false,'Perempuan','dig');
        $flashChart->axis('y',array('range' => array(0, 100, 10)));
        $flashChart->axis('x',array('range' => array(2000, 2010, 1)));
        echo $flashChart->chart('bar_glass',array('colour'=>'#CC1100'),'Laki-laki','dig');
        echo $flashChart->chart('bar_glass',array('colour'=>'#003F87'),'Perempuan','dig');
        echo $flashChart->render(720,500,'dig');
*/        //pr($flashChart);
?>
