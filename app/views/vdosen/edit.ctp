<div class="tdosenWalis form">
<?php echo $form->create('TdosenWali');?>
	<fieldset>
 		<legend><?php __('Edit Dosen Wali');?></legend>
	<?php
		
		/*echo "<div class='input text'>";
		echo $form->label("Mahasiswa Id");
		echo $form->select('mahasiswa_id',$tmahasiswas);
		echo "</div>";*/
		
		echo $form->input('nim');
		echo "<div class='input text'>";
		echo $form->label("NIP DOSEN");
		echo $form->select('nip_dosen',$tdosens);
		echo "</div>";
		
		echo "<div class='input text'>";
		echo $form->label("TAHUN AJARAN");
		echo $form->select('tahun_ajaran_id',$ttahunAjarans);
		echo "</div>";
	?>
	</fieldset>
<?php echo $form->end('Update');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('TdosenWali.nim')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('TdosenWali.nim'))); ?></li>
		<li><?php echo $html->link(__('Lihat Daftar Dosen Wali', true), array('action'=>'index'));?></li>
		
	</ul>
</div>
