<div class="tmasterNilais view">
<div class="tmasterNilais view grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Detail master Nilai');?></span></h2>
<h2><?php  __('Master Nilai');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmasterNilai['TmasterNilai']['kode']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Lulus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmasterNilai['TmasterNilai']['lulus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmasterNilai['TmasterNilai']['keterangan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Angka Min'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmasterNilai['TmasterNilai']['angka_min']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nilai'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmasterNilai['TmasterNilai']['nilai']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit', true), array('action'=>'edit', $tmasterNilai['TmasterNilai']['kode'])); ?> </li>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $tmasterNilai['TmasterNilai']['kode']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tmasterNilai['TmasterNilai']['kode'])); ?> </li>
		<li><?php echo $html->link(__('Tampilkan', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah data', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
