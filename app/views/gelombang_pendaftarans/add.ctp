<div class="gelombangPendaftarans form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Add GelombangPendaftaran');?></span></h2>
<?php echo $form->create('GelombangPendaftaran');?>
	<fieldset>
	<?php
		echo $form->input('nomor');
		echo $form->input('ttahun_ajaran_id');
		echo $form->input('keterangan');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List GelombangPendaftarans', true), array('action' => 'index'));?></li>
	</ul>
</div>
</div>
