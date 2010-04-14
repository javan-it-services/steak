<div class="jenisNilaiPendaftarans index grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Jenis Nilai Pendaftaran');?></span></h2>



<?php echo $form->create('Filter', array('url'=>'/jenis_nilai_pendaftarans/index', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<label>Tahun Ajaran</label>
			<?php echo $form->select('ttahun_ajaran_id',$ttahunAjarans,$tahun_selected,null,false)?>
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
	<th><?php echo $paginator->sort('gelombang_pendaftaran_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($jenisNilaiPendaftarans as $jenisNilaiPendaftaran):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($jenisNilaiPendaftaran['GelombangPendaftaran']['nomor'], array('controller' => 'gelombang_pendaftarans', 'action' => 'view', $jenisNilaiPendaftaran['GelombangPendaftaran']['id'])); ?>
		</td>
		<td>
			<?php echo $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['name']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action' => 'view', $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']),array('title'=>'View Detail'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action' => 'edit', $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']),array('title'=>'Edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete', $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png').__('New Jenis Nilai', true), array('action' => 'add'),array('class'=>'tombol'), null, false); ?></li>
				</ul>
	</div>
</div>
</div>
