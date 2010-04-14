<div class="tkurikulums form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Kurikulum');?></span></h2>
<?php echo $form->create('Tkurikulum');?>
	<fieldset>
	<?php
		echo $form->input('nama', array ('label'=>'Nama'));
		echo $form->input('keterangan', array ('label'=>'Keterangan'));		
	?>
	</fieldset>
<?php echo $form->end('Tambah');?>
</div>
<div class="grid_4 omega" id="sidebar">

</div>