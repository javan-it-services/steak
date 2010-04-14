<div class="tstatus_pembayarans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Status Pembayaran');?></span></h2>
<?php echo $form->create('TstatusPembayaran');?>
	<fieldset>
	<?php
		if(isset($error)){
			echo "<p><font color=\"red\"><b><center>$error</center><b></font></p>";
		}
		echo "<div class='input text'>";
		echo $form->label("NIM");
		if(isset($nim)){
			echo $form->text("NIM",array("value"=>$nim,"readonly"=>true));
		}
		else{
			echo $form->select('NIM',$tmahasiswas);
		}
		echo "</div>";


		if(isset($mahasiswa)){

			echo $form->input('id',array('label'=>false,'type'=>'hidden'));


			echo "<div class='input text'>";
			echo $form->label("Biaya");
			echo $form->input('totalbiaya', array('value' => $mahasiswa["TtahunAjaran"]["biaya"], 'readonly'=>true, 'label'=>false));
			echo "</div>";


		}




		echo "<div class='input text'>";
		echo $form->label("tahun_ajaran");
		echo $form->select('tahun_ajaran',$ttahunajarans);
		echo "</div>";
		echo "<div class='input text'>";
		echo $form->label("semester");
		echo $form->select('semester',$tsemesters);
		echo "</div>";


		echo $form->input('keterangan',array("options"=>array('Tunai'=>'Tunai','Beasiswa'=>'Beasiswa','Penundaan'=>'Penundaan','cicilan'=>'cicilan'),'empty'=>'-pilih-','id'=>'keterangan'));
		echo $ajax->observeField('keterangan', array ("url"=>'/tstatus_pembayarans/gettext','update'=>'isi_cicilan'));




	?>
	<div id='isi_cicilan'>


	</div>
	</fieldset>


<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">

</div>
