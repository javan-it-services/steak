<div class="ttugasAkhirs view grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tugas Akhir');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM1']; ?>
			<br>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM2']; ?>
			<br>
			<?php echo $ttugasAkhir['TtugasAkhir']['NIM3']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pembimbing1'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['Tdosen1']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pembimbing2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['Tdosen2']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Topik'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['TtugasAkhir']['topik']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['TtugasAkhir']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ttugasAkhir['TtugasAkhir']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit Tugas Akhir', true), array('action'=>'edit', $ttugasAkhir['TtugasAkhir']['id'])); ?> </li>
		<li><?php echo $html->link(__('Hapus tugas Akhir', true), array('action'=>'delete', $ttugasAkhir['TtugasAkhir']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ttugasAkhir['TtugasAkhir']['id'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Daftar Tugas Akhir', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Tugas Akhir', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
