<div class="users form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Password');?></span></h2>

<?php echo $form->create('User');?>
	<fieldset>
 		<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['USERNAME']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['ENABLED_USER']?'Enabled':'Disabled'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipe'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user['User']['TYPE']; ?>
			&nbsp;
		</dd>
	</dl>
	<?php
		echo $form->input('id');
		echo $form->input('PASSWORD',array('label'=>'Password Baru','type'=>'password'));
	?>
	</fieldset>

<?php
	echo $form->submit('Submit',array("name"=>"action", "value"=>"Submit"));
	echo $form->end();
?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Daftar Pengguna', true), array('action'=>'index'));?></li>
	</ul>
</div>
