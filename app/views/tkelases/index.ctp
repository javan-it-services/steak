<?php $paginator->options(array("url"=>$params)); ?>
<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Kelas');?></span></h2>


<?php echo $form->create('Filter', array('url'=>'/tkelases/index', 'class'=>'filter'))?>
	<table class="filter">
		<tr>
			<td>
				<?php echo $form->input('TTAHUN_AJARAN_ID', array("type"=>"select","options"=>$ttahunajarans,'empty'=>'--Pilih Tahun--','label'=>'Tahun Ajaran', 'div'=>false, 'fieldset'=>false))?>
			</td>
			<td>
				<?php echo $form->input('TSEMESTER_ID', array("type"=>"select","options"=>$tsemesters,'empty'=>'--Pilih Semester--','label'=>'Semester', 'div'=>'filter', 'fieldset'=>false))?>
			</td>
			<td>
				<?php echo $form->input('TDOSEN_ID', array('label'=>'NIP Dosen', 'div'=>'filter', 'fieldset'=>false))?>
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
	<th><?php echo $paginator->sort('ID');?></th>
	<th><?php echo $paginator->sort('Mata Kuliah','KD_KULIAH');?></th>
	<th><?php echo $paginator->sort('Kelas','NAMA_KELAS');?></th>
	<th><?php echo $paginator->sort('Semester','TSEMESTER_ID');?></th>
	<th><?php echo $paginator->sort('Tahun Ajaran','TTAHUN_AJARAN_ID');?></th>
	<th><?php echo $paginator->sort('Dosen','TDOSEN_ID');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php
$i = 0;
foreach ($tkelases as $tkelase):
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
			<?php echo $tkelase['Tmatakuliah']['KD_KULIAH']." - ".$tkelase['Tmatakuliah']['NAMA_KULIAH']; ?>
		</td>
		<td>
			<?php echo $tkelase['Tkelase']['NAMA_KELAS']; ?>
		</td>
		<td>
			<?php echo $tkelase['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $tkelase['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $tkelase['Tdosen']['NAMA_DOSEN']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action'=>'view', $tkelase['Tkelase']['ID']), array('title'=>'Lihat data lengkap'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action'=>'edit',$tkelase['Tkelase']['ID']), array('title'=>'edit'),false,false); ?>
			<?php //echo $html->link($html->image('del_16.png'), array('action'=>'delete', $tkelase['Tkelase']['ID']), array('title'=>'hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $tkelase['Tkelase']['ID']),false); ?>
		</td>
	</tr>
<?php endforeach; ?>
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

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png'). __('Tambah Kelas', true), array('action'=>'add'), array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
