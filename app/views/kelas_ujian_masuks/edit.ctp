<div class="kelasUjianMasuks form grid_12 alpha" id="content">
<div class="box">
<h2 class="section_name"><span class="section_name_span"><?php __('Edit KelasUjianMasuk');?></span></h2>
<?php echo $form->create('KelasUjianMasuk');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nama');
		echo $form->input('truang_kuliah_id');
		echo $form->input('gelombang_pendaftaran_id');
		echo $form->input('jenis_nilai_pendaftaran_id');
		echo $form->input('jumlah_peserta');
		echo $form->input('TcalonMahasiswa');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>

<div class="actions grid_4" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('List Kelas', true), array('action' => 'index'));?></li>
	</ul>
	</div>
</div>

