<div class="kelasUjians form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Add Kelas Ujian');?></span></h2>
<?php echo $form->create('KelasUjian');?>
	<fieldset>
	<?php
		echo $form->input('truang_kuliah_id',array('label'=>'Ruang Kuliah'));
		echo $form->input('nama');
		echo $form->input('jumlah_peserta');
		echo $form->input('jam_mulai');
		echo $form->input('jam_selesai');
		echo $form->input('tmatakuliah_id',array('label'=>'Matakuliah'));
		echo $form->input('tsemester_id',array('label'=>'Semester'));
		echo $form->input('ttahun_ajaran_id',array('label'=>'Tahun Ajaran'));
		echo $form->input('jenjang_id');
		echo $form->input('tfakultas_id',array('label'=>'Fakultas'));
		echo $form->input('tjurusan_id',array('label'=>'Jurusan'));
		echo $form->input('Tmahasiswa',array('label'=>'Mahasiswa'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>


<div class="actions grid_4 omega" id="sidebar">
	<ul>
		<li><?php echo $html->link(__('List KelasUjians', true), array('action' => 'index'));?></li>
	</ul>
</div>
