<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Status Pembayaran');?></span></h2>
<?php echo $form->create('TstatusPembayaran');?>
	<fieldset>
	<?php
		echo $form->input("id");
		echo "<div class='input text'>";
		echo $form->label("NIM");
		echo $form->select('NIM',$tmahasiswas);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("tahun_ajaran");
		echo $form->select('tahun_ajaran',$ttahunajarans);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("semester");
		echo $form->select('semester',$tsemesters);
		echo "</div>";
		
		echo $form->input('keterangan',array("options"=>array('Tunai'=>'Tunai','Beasiswa'=>'Beasiswa','Penundaan'=>'Penundaan')));
		
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('TstatusPembayaran.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
