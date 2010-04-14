<div class="formStudis form">
<?php echo $form->create('FormStudi');?>
	<fieldset>
 		<legend><?php __('Edit FormStudi');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('NIM');
		echo $form->input('ttahun_ajaran_id');
		echo $form->input('tsemester_id');
		echo $form->input('status');
		echo $form->input('status_ksm');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action'=>'delete', $form->value('FormStudi.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('FormStudi.id'))); ?></li>
		<li><?php echo $html->link(__('List FormStudis', true), array('action'=>'index'));?></li>
		<li><?php echo $html->link(__('List Ttahun Ajarans', true), array('controller'=> 'ttahun_ajarans', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ttahun Ajaran', true), array('controller'=> 'ttahun_ajarans', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tsemesters', true), array('controller'=> 'tsemesters', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tsemester', true), array('controller'=> 'tsemesters', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kartu Studis', true), array('controller'=> 'kartu_studis', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add')); ?> </li>
	</ul>
</div>
