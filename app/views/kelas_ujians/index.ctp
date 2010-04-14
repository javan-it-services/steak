<div class="kelasUjians index grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Kelas Ujian');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/kelas_ujians/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<label>Tahun Ajaran</label>
			<?php echo $form->select('ttahun_ajaran_id',$ttahunAjarans ,null,null)?>
		</td>
		<td>
			<label>Semester</label>
			<?php echo $form->select('tsemester_id',$tsemesters ,null,null)?>
		</td>
		<td>
			<label>Fakultas</label>
			<?php echo $form->select('jenjang_id', $jenjangs,null,null)?>
		</td>
		<td>
			<label>Jenjang</label>
			<?php echo $form->select('tfakultas_id',$tfakultas ,null,null)?>
		</td>
		
		<td>
			<label>Jurusan</label>
			<?php echo $form->select('tjurusan_id',$tjurusans ,null,null)?>
		</td>
		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>


<table cellpadding="0" cellspacing="0" class="Design">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('jumlah_peserta');?></th>
	<th><?php echo $paginator->sort('Ruang Kuliah','truang_kuliah_id');?></th>
	<th><?php echo $paginator->sort('Matakuliah','tmatakuliah_id');?></th>
	<th><?php echo $paginator->sort('jenjang_id');?></th>
	<th><?php echo $paginator->sort('Fakultas','tfakultas_id');?></th>
	<th><?php echo $paginator->sort('Jurusan','tjurusan_id');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kelasUjians as $kelasUjian):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kelasUjian['KelasUjian']['id']; ?>
		</td>
		<td>
			<?php echo $kelasUjian['KelasUjian']['nama']; ?>
		</td>
		<td>
			<?php echo $kelasUjian['KelasUjian']['jumlah_peserta']; ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjian['TruangKuliah']['RUANG_NAME'], array('controller' => 'truang_kuliahs', 'action' => 'view', $kelasUjian['TruangKuliah']['RUANG_ID'])); ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjian['Tmatakuliah']['NAMA_KULIAH'], array('controller' => 'tmatakuliahs', 'action' => 'view', $kelasUjian['Tmatakuliah']['KD_KULIAH'])); ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjian['Jenjang']['value'], array('controller' => 'refdetils', 'action' => 'view', $kelasUjian['Jenjang']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjian['Tfakultas']['nama'], array('controller' => 'tfakultases', 'action' => 'view', $kelasUjian['Tfakultas']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjian['Tjurusan']['namaJurusan'], array('controller' => 'tjurusans', 'action' => 'view', $kelasUjian['Tjurusan']['kodejurusan'])); ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action' => 'view', $kelasUjian['KelasUjian']['id']),array('title'=>'View Detail'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action' => 'edit', $kelasUjian['KelasUjian']['id']),array('title'=>'Edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete', $kelasUjian['KelasUjian']['id']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $kelasUjian['KelasUjian']['id']),false); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>


<div class="pagination">
	<div class="paging">
			<?php echo $paginator->prev('&laquo; '.__('Sebelumnya', true), array('escape'=>false, 'class'=>'prev'), null, array('class'=>'disabled_prev'));?>			<?php echo $paginator->numbers(array('separator'=>''));?>			<?php echo $paginator->next(__('Selanjutnya', true).' &raquo;', array('escape'=>false, 'class'=>'next'), null, array('class'=>'disabled_next'));?>	</div>
	<div class="clear"></div>
</div>



</div>
</div> <!--end class box-->

<div class="actions grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link($html->image('add_16.png').__('New KelasUjian', true), array('action' => 'add'),array('class'=>'tombol'), null, false); ?></li>
				</ul>
	</div>
</div>
</div>
