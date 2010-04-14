<div class="groups form">
<?php echo $form->create('Group');?>
	<fieldset>
 		<legend><?php __('Add Group');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('parent_id');
		echo $form->input('Link',array('multiple'=>'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
