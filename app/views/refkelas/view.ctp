<div class="refkelas view">
<h2><?php  __('Refkela');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refkela['Refkela']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $refkela['Refkela']['nama']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Refkela', true), array('action' => 'edit', $refkela['Refkela']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Refkela', true), array('action' => 'delete', $refkela['Refkela']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $refkela['Refkela']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Refkelas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Refkela', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
