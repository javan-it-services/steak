<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Kelas');?></span></h2>
<?php echo $form->create('Tkelase');?>
	<fieldset>
 		
		<?php
		echo $form->input('ID');
		//echo $form->input('KD_KULIAH', array ('label'=>'KODE KULIAH'));
		echo "<div class='input text'>";
		echo $form->label("Nama Matakuliah");
		echo $form->select('KD_KULIAH', $tmatakuliahs);
		echo "</div>";
		echo $form->input('NAMA_KELAS', array ('label'=>'Nama Kelas'));
		//echo $form->input('TSEMESTER_ID', array ('label'=>'TIPE SEMESTER'));
		echo "<div class='input text'>";
		echo $form->label("Tipe Semester");
		echo $form->select('TSEMESTER_ID', $tsemesters);
		echo "</div>";
		//echo $form->input('TTAHUN_AJARAN_ID', array ('label'=>'TAHUN AJARAN'));
		echo "<div class='input text'>";
		echo $form->label("Tahun Ajaran");
		echo $form->select('TTAHUN_AJARAN_ID', $ttahunAjarans);
		echo "</div>";
		//echo $form->input('TDOSEN_ID', array ('label'=>'DOSEN'));
		echo "<div class='input text'>";
		echo $form->label("nama Dosen");
		echo $form->select('TDOSEN_ID', $tdosens);
		echo "</div>";
	?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>
</div>
<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tkelase.ID')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
