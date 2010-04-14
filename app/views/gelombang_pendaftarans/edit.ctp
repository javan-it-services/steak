<div class="gelombangPendaftarans form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Edit GelombangPendaftaran');?></span></h2>
<?php echo $form->create('GelombangPendaftaran');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nomor');
		echo $form->input('ttahun_ajaran_id');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('GelombangPendaftaran.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('GelombangPendaftaran.id'))); ?></li>
		<li><?php echo $html->link(__('List GelombangPendaftarans', true), array('action' => 'index'));?></li>
	</ul>
</div>
</div>
