<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Matakuliah');?></span></h2>
<?php echo $form->create('Tmatakuliah');?>
	<fieldset>
	<?php
		echo $form->input('KD_KULIAH', array('type'=>'text','label'=>__('Kode', true)));
		echo $form->input('NAMA_KULIAH', array('label'=>'Nama'));
		echo $form->input('NAMA_KULIAH_ENG', array('label'=>'Nama (Bahasa Inggris)'));
		echo $form->input('FAKULTAS', array('type'=>'select','label'=>__('Fakultas', true), 'options'=>$tfakultases, 'empty'=>'--Pilih Fakultas--'));
		echo $form->input('JURUSAN', array('type'=>'select','label'=>__('Jurusan', true), 'options'=>$tjurusans, 'empty'=>'--Pilih Jurusan--'));
		echo $form->input('program_studi_id', array('type'=>'select','label'=>__('Jenjang Studi', true), 'options'=>$jenjang_studi, 'empty'=>'--Pilih Jenjang Studi--'));
		echo $form->input('SIFAT', array('label'=>'Sifat ','type'=>'select','options'=>$sifats));
		echo $form->input('SKS', array('label'=>'Sks','size'=>'8'));
		echo $form->input('tkurikulum_id', array('label'=>'Tahun Kurikulum','options'=>$tkurikulums, 'empty'=>false));
		echo $form->input('semester',array('label'=>'Semester Diajarkan','options' => array('1' => '1', '2' => '2', '3' => '3','4' => '4','5' =>' 5', '6' => '6', '7' => '7', '8' => '8')));
		echo $form->input('IS_BUKA',array('label'=>'Dibuka', 'type'=>'checkbox'));
	?>
	</fieldset>
	<hr class="separator" />
	<fieldset>
	<?php
		echo $form->input('KONSENTRASI', array('type'=>'textarea','label'=>'Konsentrasi'));
		echo $form->input('DESKRIPSI', array('type'=>'textarea','label'=>'Deskripsi Matakuliah'));

		//new field
		echo $form->input('tujuan_umum', array('type'=>'textarea','label'=>'Tujuan Umum'));
		echo $form->input('tujuan_khusus', array('type'=>'textarea','label'=>'Tujuan Khusus'));
		echo $form->input('lingkup_bahasan', array('type'=>'textarea','label'=>'Lingkup bahasan'));
		echo $form->input('literatur', array('type'=>'textarea','label'=>'Literatur'));
		echo $form->input('aturan_kuliah', array('type'=>'textarea','label'=>'Aturan Kuliah'));
		echo $form->input('penilaian', array('type'=>'textarea','label'=>'Penilaian'));
	?>
	</fieldset>
<?php echo $form->end('Tambah');?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>
