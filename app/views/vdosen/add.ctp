<div class="tdosenWalis form">
<?php echo $form->create('TdosenWali');?>
	<fieldset>
 		<legend><?php __('Tambah Dosen Wali');?></legend>
	<?php
		echo "<div class='input text'>";
		echo $form->label("NIM MAHASISWA");
		echo $form->select('nim',$tmahasiswas);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("NIP DOSEN");
		echo $form->select('nip_dosen',$tdosens);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("TAHUN AJARAN");
		echo $form->select('tahun_ajaran_id',$ttahunAjarans);
		echo "</div>";
		//echo $form->input('mahasiswa_id');
		//echo $form->input('pegawai_id');
		//echo $form->input('tahun_ajaran_id');
	?>
	</fieldset>
<?php echo $form->end('Tambah');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Lihat Daftar Dosen Wali', true), array('action'=>'index'));?></li>
			</ul>
</div>
