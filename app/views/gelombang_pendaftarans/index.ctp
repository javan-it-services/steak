<div class="gelombangPendaftarans index grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Gelombang Pendaftaran');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/gelombang_pendaftarans/index', 'class'=>'filter'))?>
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
	<th><?php echo $paginator->sort('nomor');?></th>
	<th><?php echo $paginator->sort('Tahun Ajaran','ttahun_ajaran_id');?></th>
	<th><?php echo $paginator->sort('keterangan');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($gelombangPendaftarans as $gelombangPendaftaran):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['id']; ?>
		</td>
		<td>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['nomor']; ?>
		</td>
		<td>
			<?php echo $gelombangPendaftaran['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['keterangan']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link($html->image('page_16.png'), array('action' => 'view', $gelombangPendaftaran['GelombangPendaftaran']['id']),array('title'=>'View Detail'),false,false); ?>
			<?php echo $html->link($html->image('pencil_16.png'), array('action' => 'edit', $gelombangPendaftaran['GelombangPendaftaran']['id']),array('title'=>'Edit'),false,false); ?>
			<?php echo $html->link($html->image('del_16.png'), array('action' => 'delete', $gelombangPendaftaran['GelombangPendaftaran']['id']),array('title'=>'Hapus'), sprintf(__('Are you sure you want to delete # %s?', true), $gelombangPendaftaran['GelombangPendaftaran']['id']),false); ?>
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
			<li><?php echo $html->link($html->image('add_16.png').__('New Gelombang', true), array('action' => 'add'),array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
</div>
