<div class="tpegawais form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Ubah Data Pegawai');?></span></h2>

<?php echo $form->create('Tpegawai',array("type"=>"file"));?>
	<fieldset>
	<?php
		echo $form->input('NIP_pegawai',array("type"=>"text","label"=>"NIP"));
		echo $form->input('NAMA_pegawai',array("label"=>"Nama"));
		echo $form->input('INISIAL',array("label"=>"Inisial"));
		echo $form->input('AGAMA',array("label"=>"Agama", "type"=>"select", "options"=>$tagamas));
		echo $form->input('JENIS_KELAMIN',array('label'=>'Jenis Kelamin','options' => array('L'=>'L','P'=>'P')),array("label"=>"Jenis Kelamin"));
		echo $form->input('STATUS_pegawai',array('label'=>'Status Pegawai','options' => array('pegawai Utama'=>'pegawai Utama','pegawai Pendamping'=>'pegawai Pendamping')),array("label"=>"Status Pegawai"));
		echo $form->input('STATUS_KERJA',array('label'=>'Status Kerja','options' => array('Full Time'=>'Full Time','Part Time'=>'Part Time')),array("label"=>"Status Kerja"));
			?>
			</fieldset>
			<hr class="separator" />
			<fieldset>
			<?php
		echo $form->input('INSTANSI_ASAL',array("label"=>"Instansi Asal"));
		echo $form->input('ALAMAT_INSTANSI',array("label"=>"ALamat Instansi"));
		echo $form->input('KD_PROP_INSTANSI', array("label"=>'Kode Propinsi Instansi',"type"=>"select","id"=>"KD_PROP1","options"=>$tpropinsis,'empty'=>'-pilih-'));
		echo $ajax->observeField('KD_PROP1', array ("url"=>'/Tpegawais/getkabupateninstansi','update'=>'daftar_kab'));

		echo "<div class='input text' id='daftar_kab'>";
		echo $form->label("KAB Instansi");
		echo $form->select('KD_KAB_INSTANSI',$tkabupatens);
		echo "</div>";

		echo $form->input('ALAMAT_RUMAH',array("label"=>"Alamat Rumah"));
		echo $form->input('KD_PROP_RUMAH', array("label"=>'Kode Propinsi Rumah',"type"=>"select","id"=>"KD_PROP2","options"=>$tpropinsis,'empty'=>'-pilih-'));
		echo $ajax->observeField('KD_PROP2', array ("url"=>'/Tpegawais/getkabupatenrumah','update'=>'daftar_kabrumah'));

		echo "<div class='input text' id='daftar_kabrumah'>";
		echo $form->label("KAB Rumah");
		echo $form->select('KD_KAB_RUMAH',$tkabupatens2);
		echo "</div>";
		echo $form->input('TELEPON',array("label"=>"Telepon"));
		echo $form->input('SELULAR',array("label"=>"Selular"));
		echo $form->input('FAXIMILE',array("label"=>"Fax"));
		echo $form->input('EMAIL',array("label"=>"Email"));
		echo $form->input('EMAIL_2',array("label"=>"Email2"));
		echo $form->input('SARJANA',array("label"=>"Sarjana"));
		echo $form->input('MASTER',array("label"=>"Master"));
		echo $form->input('DOKTOR',array("label"=>"Doktor"));
		echo $form->input('CV_SINGKAT',array("label"=>"CV Singkat"));
		echo $form->input('CV_SINGKAT_FILE',array("label"=>"CV Singkat File"));
		echo "<div class='input text'>";
		echo $form->label("Pangkat");
		echo $form->select('PANGKAT',$tpangkats);
		echo "</div>";
		//echo $form->input('PANGKAT');
		echo $form->input('SUAMI_ISTRI',array("label"=>"Suami/Istri"));
		echo $form->input('JUMLAH_ANAK',array("label"=>"Jumlah Anak"));
		echo $form->input('MASA_KONTRAK',array("label"=>"Masa Kontrak"));
		echo $form->input('ACCOUNT_BANK',array("label"=>"Account Bank"));
		echo $form->input('ASURANSI',array("label"=>"Asuransi"));
		echo $form->input('RIWAYAT_KERJA',array("label"=>"Riwayat Kerja"));
		echo $form->input('MOTTO',array("label"=>"Motto"));
	?>

	</fieldset>

	<script type="text/javascript">
		function tampil($form){
			document.getElementById("image").innerHTML = "<iframe id='upload_target' width='20%' name='upload_target' src='#' style='width:100;height:100;border:1;solid #fff;'></iframe>";
			$form.target = "upload_target";
			$form.action = "<?php echo $html->url("/tpegawais/upload");?>";
			$form.submit();
			$form.target ="";
			$form.action = "<?php echo $html->url("/tpegawais/edit");?>";

    }
    </script>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tpegawai.NIP_pegawai')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Tpegawai.NIP_pegawai'))); ?></li>
		<li><?php echo $html->link(__('Lihat Daftar Pegawai', true), array('action'=>'index'));?></li>
	</ul>
</div>
</div>
