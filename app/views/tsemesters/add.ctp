<div class="tsemesters form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Semester');?></span></h2>
<?php echo $form->create('Tsemester');?>
	<fieldset>
	<?php
		echo $form->input('ID');
		echo $form->input('NAME', array('label'=>'Nama'));
		echo $form->input('DESC', array('label'=>'Deskripsi'));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">
<?php echo $html->link(__('Kembali ke daftar semester', true), '/tsemesters/index'); ?>
</div>
