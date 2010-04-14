<div class="tmatakuliahs view">
<h2><?php  __('Matakuliah');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KD KULIAH'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KD_KULIAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA KULIAH'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['NAMA_KULIAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA KULIAH ENG'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['NAMA_KULIAH_ENG']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('FAKULTAS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['FAKULTAS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JENJANG STUDI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['JenjangStudi']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JURUSAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['JURUSAN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SIFAT'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['SIFAT']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['SKS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kurikulum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tkurikulum']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('IS BUKA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['IS_BUKA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KBK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KBK']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KONSENTRASI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KONSENTRASI']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DESKRIPSI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['DESKRIPSI']; ?>
			&nbsp;
		</dd>
	</dl>
</div>

<!--<div class="actions">-->
<!--	<ul>-->
<!--		<li><?php echo $html->link(__('Edit', true), array('action'=>'edit', $tmatakuliah['Tmatakuliah']['KD_KULIAH'])); ?> </li>-->
<!--		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $tmatakuliah['Tmatakuliah']['KD_KULIAH']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tmatakuliah['Tmatakuliah']['KD_KULIAH'])); ?> </li>-->
<!--		<li><?php echo $html->link(__('Tampilkan Data', true), array('action'=>'index')); ?> </li>-->
<!--		<li><?php echo $html->link(__('Tambah Data', true), array('action'=>'add')); ?> </li>-->
<!--	</ul>-->
<!--</div>-->
