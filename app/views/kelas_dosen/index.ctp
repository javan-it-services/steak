<?php $paginator->options(array("url"=>$params)); ?>
<div class="kelas_dosens index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Kelas Dosen');?></span></h2>

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

<?php	echo $form->create("Filter",array("url"=>"/kelas_dosen/index", 'class'=>'filter')); ?>
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



<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th>KELAS</th>
	<th>KODE KULIAH</th>
	<th>NAMA KULIAH</th>
	
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
			<?php echo $k['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $k['Tkelase']['KD_KULIAH']; ?>
		</td>
		<td>
			<?php echo $k['Tmatakuliah']['NAMA_KULIAH']; ?>
			<div><?php echo $k['Tmatakuliah']['NAMA_KULIAH_ENG']; ?></div>
		</td>
		
		<td>
			<?php echo $k['Tmatakuliah']['SKS']; ?>
		</td>
		<td>
			<?php echo $k['Tmatakuliah']['SIFAT']; ?>
		</td>

		<td class="actions">
			<?php echo $html->link($html->image('mhs_48.png'), array('action'=>'view_mahasiswa', $k['Tkelase']['ID']), array('title'=>'Lihat Mahasiswa'),false,false); ?>
			<?php echo $html->link($html->image('table_48.png'), array('action'=>'view_jadwal', $k['Tkelase']['ID']), array('title'=>'Lihat Jadwal'),false,false); ?>
			
		</td>
	</tr>

<?php endforeach; ?>
</tbody>
</table>
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