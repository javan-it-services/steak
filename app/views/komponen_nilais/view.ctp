<div class="komponenNilais view">
<h2><?php  __('KomponenNilai');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $komponenNilai['KomponenNilai']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tkelase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($komponenNilai['Tkelase']['ID'], array('controller'=> 'tkelases', 'action'=>'view', $komponenNilai['Tkelase']['ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $komponenNilai['KomponenNilai']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Persentase'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $komponenNilai['KomponenNilai']['persentase']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit KomponenNilai', true), array('action'=>'edit', $komponenNilai['KomponenNilai']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete KomponenNilai', true), array('action'=>'delete', $komponenNilai['KomponenNilai']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $komponenNilai['KomponenNilai']['id'])); ?> </li>
		<li><?php echo $html->link(__('List KomponenNilais', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New KomponenNilai', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tkelases', true), array('controller'=> 'tkelases', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tkelase', true), array('controller'=> 'tkelases', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kartu Studis', true), array('controller'=> 'kartu_studis', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Kartu Studis');?></h3>
	<?php if (!empty($komponenNilai['KartuStudi'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Form Studi Id'); ?></th>
		<th><?php __('Kelas Id'); ?></th>
		<th><?php __('Status Lulus'); ?></th>
		<th><?php __('Nilai Akhir'); ?></th>
		<th class="actions"><?php __('Aksi');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($komponenNilai['KartuStudi'] as $kartuStudi):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $kartuStudi['id'];?></td>
			<td><?php echo $kartuStudi['form_studi_id'];?></td>
			<td><?php echo $kartuStudi['kelas_id'];?></td>
			<td><?php echo $kartuStudi['status_lulus'];?></td>
			<td><?php echo $kartuStudi['nilai_akhir'];?></td>
			<td class="actions">
				<?php echo $html->link(__('View', true), array('controller'=> 'kartu_studis', 'action'=>'view', $kartuStudi['id'])); ?>
				<?php echo $html->link(__('Edit', true), array('controller'=> 'kartu_studis', 'action'=>'edit', $kartuStudi['id'])); ?>
				<?php echo $html->link(__('Delete', true), array('controller'=> 'kartu_studis', 'action'=>'delete', $kartuStudi['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $kartuStudi['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add'));?> </li>
		</ul>
	</div>
</div>
