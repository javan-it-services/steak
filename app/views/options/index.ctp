<div class="options form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Semester Berjalan');?></span></h2>

<?php echo $form->create('Option', array('url' => array('action' =>'index')));?>
	<fieldset>
	<?php
		echo $form->input("id");
		echo "<div class='input text'>";
		echo $form->label("Tahun Ajaran");
		echo $form->select('ttahun_ajaran_id',$ttahunAjarans);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Semester");
		echo $form->select('tsemester_id',$tsemesters);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("Kurikulum");
		echo $form->select('tkurikulum_id',$tkurikulums);
		echo "</div>";
		echo $form->input('Configuration.gelombang_pendaftaran_id', array('type' => 'select', 'options' =>$gelombangs, 'selected' => $gelombangId,'empty'=>'--Pilih--'));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>
