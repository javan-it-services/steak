<div class="periodes index">
<h2><?php __('Periodes');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Halaman %page% of %pages%, Menampilkan %current% dari  %count% , Mulai dari baris ke %start%, sampai %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class = "Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('Tahun Ajaran','ttahun_ajaran_id');?></th>
	<th><?php echo $paginator->sort('Semester','tsemester_id');?></th>
	<th><?php echo $paginator->sort('Tanggal Mulai','tgl_mulai');?></th>
	<th><?php echo $paginator->sort('Tanggal Selesai','tgl_selesai');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<?php foreach ($periodes as $periode): ?>
<tbody>
	<tr>
		<td>
			<?php echo $periode['Periode']['id']; ?>
		</td>
		<td>
			<?php echo $periode['Periode']['nama']; ?>
		</td>
		<td>
			<?php echo $periode['TtahunAjaran']['nama']; ?>
		</td>
		<td>
			<?php echo $periode['Tsemester']['NAME']; ?>
		</td>
		<td>
			<?php echo $periode['Periode']['tgl_mulai']; ?>
		</td>
		<td>
			<?php echo $periode['Periode']['tgl_selesai']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $periode['Periode']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $periode['Periode']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $periode['Periode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $periode['Periode']['id'])); ?>
		</td>
	</tr>
</tbody>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('sebelumnya', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('selanjutnya', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Tambah Baru', true), array('action'=>'add')); ?></li>
	</ul>
</div>
