<div class="kelasUjianMasuks index grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Kelas Ujian Masuk');?></span></h2>



<?php echo $form->create('Filter', array('url'=>'/kelas_ujian_masuks/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<label>Gelombang Pendaftaran</label>
			<?php echo $form->select('gelombang_pendaftaran_id',$gelombang ,null,null)?>
		</td>
		<td>
			<label>Test Masuk</label>
			<?php echo $form->select('jenis_nilai_pendaftaran_id',$jenis ,null,null)?>
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
	<th><?php echo $paginator->sort('Ruang','truang_kelas_id');?></th>
	<th><?php echo $paginator->sort('gelombang_pendaftaran_id');?></th>
	<th><?php echo $paginator->sort('jenis_nilai_pendaftaran_id');?></th>
	<th><?php echo $paginator->sort('jumlah_peserta');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($kelasUjianMasuks as $kelasUjianMasuk):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $kelasUjianMasuk['KelasUjianMasuk']['id']; ?>
		</td>
		
		<td>
			<?php echo $kelasUjianMasuk['KelasUjianMasuk']['nama']; ?>
		</td>
		
		<td>
			<?php echo $kelasUjianMasuk['TruangKuliah']['RUANG_NAME']; ?>
		</td>
		
		<td>
			<?php echo $html->link($kelasUjianMasuk['GelombangPendaftaran']['nomor'], array('controller' => 'gelombang_pendaftarans', 'action' => 'view', $kelasUjianMasuk['GelombangPendaftaran']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($kelasUjianMasuk['JenisNilaiPendaftaran']['name'], array('controller' => 'jenis_nilai_pendaftarans', 'action' => 'view', $kelasUjianMasuk['JenisNilaiPendaftaran']['id'])); ?>
		</td>
		<td>
			<?php echo $kelasUjianMasuk['KelasUjianMasuk']['jumlah_peserta']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action' => 'view', $kelasUjianMasuk['KelasUjianMasuk']['id']),array('title'=>'View Detail'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action' => 'edit', $kelasUjianMasuk['KelasUjianMasuk']['id']),array('title'=>'Edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete', $kelasUjianMasuk['KelasUjianMasuk']['id']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $kelasUjianMasuk['KelasUjianMasuk']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png').__('New KelasUjianMasuk', true), array('action' => 'add'),array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
</div>
