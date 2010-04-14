<div class="gelombangPendaftarans view grid_12 alpha" id="content">
<div class="box">

<h2 class="section_name"><span class="section_name_span"><?php  __('GelombangPendaftaran');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nomor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['nomor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gelombangPendaftaran['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Keterangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gelombangPendaftaran['GelombangPendaftaran']['keterangan']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
</div>
<div class="actions grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link(__('Edit Gelombang Pendaftaran', true), array('action' => 'edit', $gelombangPendaftaran['GelombangPendaftaran']['id'])); ?> </li>
			<li><?php echo $html->link(__('Delete Gelombang Pendaftaran', true), array('action' => 'delete', $gelombangPendaftaran['GelombangPendaftaran']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gelombangPendaftaran['GelombangPendaftaran']['id'])); ?> </li>
			<li><?php echo $html->link(__('List Gelombang Pendaftaran', true), array('action' => 'index')); ?> </li>
			<li><?php echo $html->link(__('New Gelombang Pendaftaran', true), array('action' => 'add')); ?> </li>
		</ul>
	</div>
</div>

