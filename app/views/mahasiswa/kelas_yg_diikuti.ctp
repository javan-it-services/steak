<script type="text/javascript">
	function sembunyikan(id){
		document.getElementById(id).innerHTML = "";
	}
</script>

<div class="mahasiswa index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Kelas');?></span></h2>


<?php echo $form->create('Filter',array('url'=>'/mahasiswa/kelas_yg_diikuti', 'class'=>'filter'));?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('TTAHUN_AJARAN_ID', array("type"=>"select","options"=>$ttahunajarans,'empty'=>'--Pilih Tahun--','label'=>'Tahun Ajaran', 'div'=>false, 'fieldset'=>false))?>
			
		</td>
		<td>
			<?php echo $form->input('TSEMESTER_ID', array("type"=>"select","options"=>$tsemesters,'empty'=>'--Pilih Semester--','label'=>'Semester', 'div'=>'filter', 'fieldset'=>false))?>
			
				
			
		</td>
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>

<div style="clear:both"></div>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>

	<th><?php echo ('ID');?></th>
	
	<th><?php echo ('KD_KULIAH');?></th>
	<th><?php echo ('NAMA_KELAS');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
//echo "NIM : " . $tmahasiswas;

foreach ($KartuStudis as $tkelase):
//pr($tkelase);
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tkelase['Tkelase']['ID']; ?>
		</td>
		
		
		<td>
			<?php echo $tkelase['Tkelase']['KD_KULIAH']/*." - ".$tkelase['Tmatakuliah']['NAMA_KULIAH'];*/ ?>
		</td>
		<td>
			<?php echo $tkelase['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td class="actions">		
		<?php echo $ajax->link('Jadwal','', array('url'=>'jadwal/'.$tkelase['Tkelase']['ID'], 'update'=>'jadwal_kelas'.$tkelase['Tkelase']['ID'])); ?>
		&nbsp;&nbsp;
		<?php echo $ajax->link('Nilai','', array('url'=>'viewkomponennilai/'.$tkelase['KartuStudi']['id'], 'update'=>'jadwal_kelas'.$tkelase['Tkelase']['ID'])); ?>
		&nbsp;&nbsp;
		<?php //echo $html->link($html->image('paper_48.png'), array('action'=>'view', $tkelase['KartuStudi']['kelas_id']), array('title'=>'Cetak Nilai'),false,false); ?>		
		</td>
	</tr>
	<tr><td colspan=5><div id="jadwal_kelas<?=$tkelase['Tkelase']['ID']?>"></div></td></tr>
<?php endforeach; ?>
</table>
</div>
</div>