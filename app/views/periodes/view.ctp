<div class="periodes view">
<h2><?php  __('Periode');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['Periode']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA PERIODE'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['Periode']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TAHUN AJARAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TIPE SEMESTER'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['Tsemester']['NAME']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tgl Mulai'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['Periode']['tgl_mulai']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tgl Selesai'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $periode['Periode']['tgl_selesai']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Periode', true), array('action'=>'edit', $periode['Periode']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete Periode', true), array('action'=>'delete', $periode['Periode']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $periode['Periode']['id'])); ?> </li>
		<li><?php echo $html->link(__('List Periodes', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('New Periode', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
