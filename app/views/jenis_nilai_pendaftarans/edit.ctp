<div class="jenisNilaiPendaftarans form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Edit JenisNilaiPendaftaran');?></span></h2>
<?php echo $form->create('JenisNilaiPendaftaran');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('gelombang_pendaftaran_id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('JenisNilaiPendaftaran.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('JenisNilaiPendaftaran.id'))); ?></li>
		<li><?php echo $html->link(__('List JenisNilaiPendaftarans', true), array('action' => 'index'));?></li>
		<li><?php echo $html->link(__('List Gelombang Pendaftarans', true), array('controller' => 'gelombang_pendaftarans', 'action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New Gelombang Pendaftaran', true), array('controller' => 'gelombang_pendaftarans', 'action' => 'add')); ?> </li>
	</ul>
</div>
</div>
