<div class="komponenNilais index">
<h2><?php __('KomponenNilais');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('tkelas_id');?></th>
	<th><?php echo $paginator->sort('nama');?></th>
	<th><?php echo $paginator->sort('persentase');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
<?php
$i = 0;
foreach ($komponenNilais as $komponenNilai):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $komponenNilai['KomponenNilai']['id']; ?>
		</td>
		<td>
			<?php echo $html->link($komponenNilai['Tkelase']['ID'], array('controller'=> 'tkelases', 'action'=>'view', $komponenNilai['Tkelase']['ID'])); ?>
		</td>
		<td>
			<?php echo $komponenNilai['KomponenNilai']['nama']; ?>
		</td>
		<td>
			<?php echo $komponenNilai['KomponenNilai']['persentase']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $komponenNilai['KomponenNilai']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $komponenNilai['KomponenNilai']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $komponenNilai['KomponenNilai']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $komponenNilai['KomponenNilai']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New KomponenNilai', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Tkelases', true), array('controller'=> 'tkelases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tkelase', true), array('controller'=> 'tkelases', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kartu Studis', true), array('controller'=> 'kartu_studis', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add')); ?> </li>
	</ul>
</div>
