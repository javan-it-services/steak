<div class="groups view">
<h2><?php  __('Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $group['Group']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Group', true), array('action'=>'edit', $group['Group']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Group', true), array('action'=>'delete', $group['Group']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $group['Group']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Groups', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Group', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Links', true), array('controller'=> 'links', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Link', true), array('controller'=> 'links', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Links');?></h3>
	<?php if (!empty($group['Link'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Controller'); ?></th>
		<th><?php __('Action'); ?></th>
		<th><?php __('Name'); ?></th>
		<th class="actions"><?php __('Aksi');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($group['Link'] as $link):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $link['id'];?></td>
			<td><?php echo $link['controller'];?></td>
			<td><?php echo $link['action'];?></td>
			<td><?php echo $link['name'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'links', 'action'=>'view', $link['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'links', 'action'=>'edit', $link['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'links', 'action'=>'delete', $link['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $link['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Link', true), array('controller'=> 'links', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
