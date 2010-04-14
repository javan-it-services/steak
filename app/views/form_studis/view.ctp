<div class="formStudis view">
<h2><?php  __('FormStudi');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['NIM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ttahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($formStudi['TtahunAjaran']['nama'], array('controller'=> 'ttahun_ajarans', 'action'=>'view', $formStudi['TtahunAjaran']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tsemester'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($formStudi['Tsemester']['NAME'], array('controller'=> 'tsemesters', 'action'=>'view', $formStudi['Tsemester']['ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Ksm'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $formStudi['FormStudi']['status_ksm']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit FormStudi', true), array('action'=>'edit', $formStudi['FormStudi']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete FormStudi', true), array('action'=>'delete', $formStudi['FormStudi']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $formStudi['FormStudi']['id'])); ?> </li>
		<li><?php echo $html->link(__('List FormStudis', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New FormStudi', true), array('action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Ttahun Ajarans', true), array('controller'=> 'ttahun_ajarans', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Ttahun Ajaran', true), array('controller'=> 'ttahun_ajarans', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Tsemesters', true), array('controller'=> 'tsemesters', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Tsemester', true), array('controller'=> 'tsemesters', 'action'=>'add')); ?> </li>
		<li><?php echo $html->link(__('List Kartu Studis', true), array('controller'=> 'kartu_studis', 'action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Kartu Studi', true), array('controller'=> 'kartu_studis', 'action'=>'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Kartu Studis');?></h3>
	<?php if (!empty($formStudi['KartuStudi'])):?>
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
		foreach ($formStudi['KartuStudi'] as $kartuStudi):
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
