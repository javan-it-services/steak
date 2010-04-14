<div class="tsilabusMingguanKelases index">
<h2><?php __('TsilabusMingguanKelase');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0" class="Design">
<thead>
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('silabus_mingguan_id');?></th>
	<th><?php echo $paginator->sort('kelas_id');?></th>
	<th><?php echo $paginator->sort('tanggal');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
</thead>
<tbody>
<?php
$i = 0;
foreach ($tsilabusMingguanKelases as $tsilabusMingguanKelase):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}

?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $tsilabusMingguanKelase['TsilabusMingguanKelase']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($tsilabusMingguanKelase['TsilabusMingguanKelase']['silabus_mingguan_id'], array('controller'=> 'tsilabus_mingguans', 'action'=>'view', $tsilabusMingguanKelase['TsilabusMingguan']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($tsilabusMingguanKelase['Tkelase']['NAMA_KELAS'], array('controller'=> 'tkelases', 'action'=>'view', $tsilabusMingguanKelase['Tkelase']['ID'])); ?>
		</td>
		<td>
			<?php echo $tsilabusMingguanKelase['TsilabusMingguanKelase']['tanggal']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
