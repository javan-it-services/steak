<div class="users form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Enable User');?></span></h2>
<?php echo $form->create('User',array('url'=>'/users/enable'));?>
	<fieldset>
 		<legend><?php __('Active User');?></legend>
	<?php
		echo $form->hidden('id');
        echo $form->hidden('ENABLED_USER',array('value'=>1));
		echo $form->input('USERNAME');
		echo $form->input('PASSWORD',array('value'=> ''));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Users', true), array('action'=>'index'));?></li>
	</ul>
</div>
</div>
</div>