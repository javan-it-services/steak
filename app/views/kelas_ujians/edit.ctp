<div class="kelasUjians form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Edit KelasUjian');?></span></h2>
<?php echo $form->create('KelasUjian');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nama');
		echo $form->input('jumlah_peserta');
		echo $form->input('jam_mulai');
		echo $form->input('jam_selesai');
		echo $form->input('truang_kuliah_id');
		echo $form->input('tmatakuliah_id');
		echo $form->input('tsemester_id');
		echo $form->input('ttahun_ajaran_id');
		echo $form->input('jenjang_id');
		echo $form->input('tfakultas_id');
		echo $form->input('tjurusan_id');
		echo $form->input('Tmahasiswa');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>
