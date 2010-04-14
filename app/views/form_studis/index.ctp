<div class="formStudis index">
<h2><?php __('FormStudis');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('NIM');?></th>
	<th><?php echo $paginator->sort('ttahun_ajaran_id');?></th>
	<th><?php echo $paginator->sort('tsemester_id');?></th>
	<th><?php echo $paginator->sort('status');?></th>
	<th><?php echo $paginator->sort('created');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th><?php echo $paginator->sort('status_ksm');?></th>
	<th class="actions"><?php __('Aksi');?></th>
</tr>
<?php
$i = 0;
foreach ($formStudis as $formStudi):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $formStudi['FormStudi']['id']; ?>
		</td>
		<td>
			<?php echo $formStudi['FormStudi']['NIM']; ?>
		</td>
		<td>
			<?php echo $html->link($formStudi['TtahunAjaran']['nama'], array('controller'=> 'ttahun_ajarans', 'action'=>'view', $formStudi['TtahunAjaran']['id'])); ?>
		</td>
		<td>
			<?php echo $html->link($formStudi['Tsemester']['NAME'], array('controller'=> 'tsemesters', 'action'=>'view', $formStudi['Tsemester']['ID'])); ?>
		</td>
		<td>
			<?php echo $formStudi['FormStudi']['status']; ?>
		</td>
		<td>
			<?php echo $formStudi['FormStudi']['created']; ?>
		</td>
		<td>
			<?php echo $formStudi['FormStudi']['modified']; ?>
		</td>
		<td>
			<?php echo $formStudi['FormStudi']['status_ksm']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action'=>'view', $formStudi['FormStudi']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action'=>'edit', $formStudi['FormStudi']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action'=>'delete', $formStudi['FormStudi']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formStudi['FormStudi']['id'])); ?>
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
		<li><?php echo $html->link(__('New FormStudi', true), array('action'=>'add')); ?></li>
		<li><?php echo $html->link(__('List Ttahun Ajarans', true), array('controller'=> 'ttahun_ajarans', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ttahun Ajaran', true), array('controller'=> 'ttahun_ajarans', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tsemesters', true), array('controller'=> 'tsemesters', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tsemester', true), array('controller'=> 'tsemesters', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kartu Studis', true), array('controller'=> 'kartu_studis', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add')); ?> </li>
	</ul>
</div>
