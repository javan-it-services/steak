<div class="tangkatans view">
<h2><?php  __('Angkatan');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ANGKATAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tangkatan['Tangkatan']['ANGKATAN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SEM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tangkatan['Tangkatan']['SEM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('THN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tangkatan['Tangkatan']['THN']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ubah Angkatan', true), array('action'=>'edit', $tangkatan['Tangkatan']['ANGKATAN'])); ?> </li>
		<li><?php echo $html->link(__('Hapus Angkatan', true), array('action'=>'delete', $tangkatan['Tangkatan']['ANGKATAN']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tangkatan['Tangkatan']['ANGKATAN'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Daftar Angkatan', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Angkatan', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
