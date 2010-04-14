<div class="jenisNilaiPendaftarans view grid_12 alpha" id="content">
<div class="box">

<h2 class="section_name"><span class="section_name_span"><?php  __('JenisNilaiPendaftaran');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gelombang Pendaftaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($jenisNilaiPendaftaran['GelombangPendaftaran']['id'], array('controller' => 'gelombang_pendaftarans', 'action' => 'view', $jenisNilaiPendaftaran['GelombangPendaftaran']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit JenisNilaiPendaftaran', true), array('action' => 'edit', $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete JenisNilaiPendaftaran', true), array('action' => 'delete', $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $jenisNilaiPendaftaran['JenisNilaiPendaftaran']['id'])); ?> </li>
		<li><?php echo $html->link(__('List JenisNilaiPendaftarans', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New JenisNilaiPendaftaran', true), array('action' => 'add')); ?> </li>
		<li><?php echo $html->link(__('List Gelombang Pendaftarans', true), array('controller' => 'gelombang_pendaftarans', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Gelombang Pendaftaran', true), array('controller' => 'gelombang_pendaftarans', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
