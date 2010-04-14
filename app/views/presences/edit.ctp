<div class="presences form">
<?php echo $form->create('Presence');?>
	<fieldset>
 		<legend><?php __('Edit Presence');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('nim');
		echo $form->input('pertemuan_id');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('Presence.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Presence.id'))); ?></li>
		<li><?php echo $html->link(__('List Presences', true), array('action'=>'index'));?></li>
	</ul>
</div>
