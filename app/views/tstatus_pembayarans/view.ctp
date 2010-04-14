<div class="tstatusPembayarans view grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Pembayaran');?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Mahasiswa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($tstatusPembayaran['Tmahasiswa']['NAMA'], array('controller'=> 'tmahasiswas', 'action'=>'view', $tstatusPembayaran['Tmahasiswa']['NIM'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($tstatusPembayaran['TtahunAjaran']['nama'], array('controller'=> 'ttahun_ajarans', 'action'=>'view', $tstatusPembayaran['TtahunAjaran']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Semester'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($tstatusPembayaran['Tsemester']['NAME'], array('controller'=> 'tsemesters', 'action'=>'view', $tstatusPembayaran['Tsemester']['ID'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tstatusPembayaran['TstatusPembayaran']['keterangan']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ubah Status Pembayaran', true), array('action'=>'edit', $tstatusPembayaran['TstatusPembayaran']['NIM'])); ?> </li>
		<li><?php echo $html->link(__('Hapus Status Pembayaran', true), array('action'=>'delete', $tstatusPembayaran['TstatusPembayaran']['NIM']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tstatusPembayaran['TstatusPembayaran']['NIM'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Status Pembayaran', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Status Pembayaran', true), array('action'=>'add')); ?> </li>
		
	</ul>
</div>
