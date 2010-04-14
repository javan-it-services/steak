<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Statistik Data Mahasiswa');?></span></h2>
<?php echo $form->create('Filter', array('url'=>'/statistik/test',"id"=>"IdFilter", 'class'=>'filter'))?>
			<table class="filter">
				<tr>
					<td>
						<?php echo $form->input('kriteria', array('type'=>'select', 'empty'=>'-pilih-',"label"=>"Kriteria", 'options'=> array('AGAMA'=>'AGAMA','JENIS_KELAMIN'=>'JENIS KELAMIN'/*,'AGAMA1'=>'AGAMA1'*/), 'div'=>'filter', 'fieldset'=>false))?>
					</td>
					<td>
						<label>&nbsp;</label>
						<?php echo $form->submit('Filter') ?>
					</td>
				</tr>
			</table>


<p>
<?php
	if(isset($statAgama)){

		echo $flashChart->begin(array('prototype'=>true));
        $flashChart->setTitle('Mahasiswa berdasar agama');

        $flashChart->setData($Islam,'{n}',false,'Islam','dig');
      	$flashChart->setData($Kristen,'{n}',false,'Kristen','dig');
      	$flashChart->setData($Hindu,'{n}',false,'Hindu','dig');
      	$flashChart->setData($Buddha,'{n}',false,'Buddha','dig');
      	$flashChart->setData($Katolik,'{n}',false,'Katolik','dig');
      	$flashChart->setData($Kepercayaan,'{n}',false,'Kepercayaan','dig');
        $flashChart->axis('y',array('range' => $y));
        $flashChart->axis('x',array('range' => $x));
        echo $flashChart->chart('bar',array('colour'=>'#66CC33','key'=>array('Islam',12)),'Islam','dig');
        echo $flashChart->chart('bar',array('colour'=>'#FF0000','key'=>array('Kristen',12)),'Kristen','dig');
        echo $flashChart->chart('bar',array('colour'=>'#FFFF33','key'=>array('Hindu',12)),'Hindu','dig');
        echo $flashChart->chart('bar',array('colour'=>'#33FFFF','key'=>array('Buddha',12)),'Buddha','dig');
        echo $flashChart->chart('bar',array('colour'=>'#CC00CC','key'=>array('Katolik',12)),'Katolik','dig');
        echo $flashChart->chart('bar',array('colour'=>'#FF9900','key'=>array('Kepercayaan',12)),'Kepercayaan','dig');
        echo $flashChart->render(600,200,'dig');
	}else{
        echo $flashChart->begin(array('prototype'=>true));
        $flashChart->setTitle('Mahasiswa berdasar jenis kelamin');
        $flashChart->setData($laki,'{n}',false,'Laki-laki','dig');
        $flashChart->setData($perempuan,'{n}',false,'Perempuan','dig');
        $flashChart->axis('y',array('range' => $y));
        $flashChart->axis('x',array('range' => $x));
        echo $flashChart->chart('bar',array('colour'=>'#CC1100','key'=>array('laki-laki',12)),'Laki-laki','dig');
        echo $flashChart->chart('bar',array('colour'=>'#003F87','key'=>array('Perempuan',12)),'Perempuan','dig');
        echo $flashChart->render(600,200,'dig');
	}
?>
    </div>
</div>
