<div class="periodes form">
<?php echo $form->create('Periode');?>
	<fieldset>
 		<legend><?php __('Tambah Periode');?></legend>
	<?php
		echo $form->input('nama', array ('label'=>'NAMA PERIODE'));
		//echo $form->input('ttahun_ajaran_id');
		echo "<div class='input text'>";
		echo $form->label("TAHUN AJARAN");
		echo $form->select('ttahun_ajaran_id', $ttahunAjarans);
		echo "</div>";
		//echo $form->input('tsemester_id');
		echo "<div class='input text'>";
		echo $form->label("TIPE SEMESTER");
		echo $form->select('tsemester_id', $tsemesters);
		echo "</div>";
		//echo $form->input('tgl_mulai');
		echo $form->input('tgl_mulai',array('type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','label'=>'TANGGAL MULAI'));
		echo $form->input('tgl_selesai',array('type'=>'text', 'class'=>'w8em format-y-m-d divider-dash','label'=>'TANGGAL SELESAI'));
	?>
	</fieldset>
<?php echo $form->end('Tambah');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Tampilkan Periode', true), array('action'=>'index'));?></li>
	</ul>
</div>
