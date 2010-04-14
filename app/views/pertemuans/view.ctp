<div class="pertemuans view">
<h2><?php  __('Pertemuan');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pertemuan['Pertemuan']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tkelase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pertemuan['Tkelase']['NAMA_KELAS'], array('controller'=> 'tkelases', 'action'=>'view', $pertemuan['Tkelase']['ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pertemuan['Pertemuan']['tanggal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jam'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $pertemuan['Pertemuan']['jam']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Truang Kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($pertemuan['TruangKuliah']['RUANG_NAME'], array('controller'=> 'truang_kuliahs', 'action'=>'view', $pertemuan['TruangKuliah']['RUANG_ID'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Pertemuan', true), array('action'=>'edit', $pertemuan['Pertemuan']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Pertemuan', true), array('action'=>'delete', $pertemuan['Pertemuan']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $pertemuan['Pertemuan']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Pertemuans', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Pertemuan', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tkelases', true), array('controller'=> 'tkelases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tkelase', true), array('controller'=> 'tkelases', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Truang Kuliahs', true), array('controller'=> 'truang_kuliahs', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Truang Kuliah', true), array('controller'=> 'truang_kuliahs', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Presences', true), array('controller'=> 'presences', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Presence', true), array('controller'=> 'presences', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Presences');?></h3>
	<?php if (!empty($pertemuan['Presence'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Nim'); ?></th>
		<th><?php __('Pertemuan Id'); ?></th>
		<th><?php __('Keterangan'); ?></th>
		<th class="actions"><?php __('Aksi');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pertemuan['Presence'] as $presence):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $presence['id'];?></td>
			<td><?php echo $presence['nim'];?></td>
			<td><?php echo $presence['pertemuan_id'];?></td>
			<td><?php echo $presence['keterangan'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'presences', 'action'=>'view', $presence['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'presences', 'action'=>'edit', $presence['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'presences', 'action'=>'delete', $presence['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $presence['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Presence', true), array('controller'=> 'presences', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
