<div class="tkurikulums form grid_12 alpha " id="content">
<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Kurikulum');?></span></h2>

<?php echo $form->create('Tkurikulum');?>
	<fieldset>
 		
	<?php
		echo $form->input('id');
		echo $form->input('nama', array ('label'=>'Nama'));
		echo $form->input('keterangan', array ('label'=>'Keterangan'));		
	?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tkurikulum.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
