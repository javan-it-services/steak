<?php $paginator->options(array("url"=>$params)); ?>
<div class="presences index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Daftar Kelas');?></span></h2>


<?php echo $form->create('Filter',array('url'=>'/presences/kehadiran', 'class'=>'filter'));?>
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

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dosen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dosen['Tdosen']['NAMA_DOSEN'] ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIP'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $dosen['Tdosen']['NIP_DOSEN'] ?>
			&nbsp;
		</dd>
	</dl>

<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>KODE KULIAH</th>
	<th>NAMA KULIAH</th>
	<th>KELAS</th>
	<th>SKS</th>
	<th>SIFAT</th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
foreach ($kelas as $k):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $k['Tkelase']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $k['Tmatakuliah']['NAMA_KULIAH']; ?>
			<div><?php echo $k['Tmatakuliah']['NAMA_KULIAH_ENG']; ?></div>
		</td>
		<td>
			<?php echo $k['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $k['Tmatakuliah']['SKS']; ?>
		</td>
		<td>
			<?php echo $k['Tmatakuliah']['SIFAT']; ?>
		</td>

		<td class="actions">
			<?php echo $html->link($html->image('pencil_48.png'), array('action'=>'add_absen', $k['Tkelase']['ID']), array('title'=>'Isi Kehadiran Mahasiswa'),false,false); ?>
			<?php echo $ajax ->link('Lihat Rekap Absen',"" ,array ("url"=>'daftar_hadir/'.$k['Tkelase']['ID'],'update'=> "daftar_hadir".$k['Tkelase']['ID'], 'title'=>'Lihat Rekap Kehadiran Mahasiswa')); ?>
			
		</td>
		<tr>
		<td colspan="6">
			<div id=<?php echo "daftar_hadir".$k['Tkelase']['ID'] ?>></div>
		</td>
		</tr>
	</tr>

<?php endforeach; ?>
</tbody>
</table>
<script>
	function sembunyi(id){
		//alert("tes");
		document.getElementById(id).display='none';
		
	}
</script>
<div class="pagination">
			<div class="paging">
				<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>
				<?php echo $paginator->numbers(array('separator'=>''));?>
				<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>