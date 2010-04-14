<div class="groups form">
<?php echo $form->create('Group');?>
	<fieldset>
 		<legend><?php __('Edit Group');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('parent_id');
		echo $form->input('Link',array('multiple'=>'checkbox'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Group.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Group.id'))); ?></li>
		<li><?php echo $html->link(__('List Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Parent', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Links', true), array('controller' => 'links', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Link', true), array('controller' => 'links', 'action' => 'add')); ?> </li>
	</ul>
</div>
