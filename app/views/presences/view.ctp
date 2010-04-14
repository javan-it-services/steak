<div class="presences view">
<h2><?php  __('Presence');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $presence['Presence']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nim'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $presence['Presence']['nim']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pertemuan Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $presence['Presence']['pertemuan_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $presence['Presence']['keterangan']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Presence', true), array('action'=>'edit', $presence['Presence']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Presence', true), array('action'=>'delete', $presence['Presence']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presence['Presence']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Presences', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Presence', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
