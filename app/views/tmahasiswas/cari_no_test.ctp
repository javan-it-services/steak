<div class="tmahasiswas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Cari No. Test untuk daftar Ulang');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/tcalonMahasiswas/cari_no_test', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NO_TEST', array('label'=>'NO TEST', 'div'=>'filter', 'fieldset'=>false))?>
		</td>
		
		<td>
			<label>&nbsp;</label>
			<?php echo $form->submit('Filter') ?>
		</td>
	</tr>
</table>
</form>
<?php
	
	if(isset($error)){
		echo "<p>$error</p>";
	}
	if(isset($payments)){		
		if(!empty($payments)):?>
		<? foreach($payments as $row):?>
		<? //pr($row);?>
		<?php echo $form->create('T2calonMahasiswa',array('url'=>'/tmahasiswas/add','class'=>'plain', "type"=>"file"));?>
			<fieldset> Pribadi
			<?php
				echo $form->input('NO_TEST', array('label'=>'No Test','value'=>$row['TcalonMahasiswa']['NO_TEST'],'ReadOnly'=>TRUE));
				echo $form->input('NAMA', array('label'=>'Nama','value'=>$row['TcalonMahasiswa']['NAMA'],'ReadOnly'=>TRUE));
				echo $form->input('ALAMAT', array('label'=>'Alamat','value'=>$row['TcalonMahasiswa']['ALAMAT'],'ReadOnly'=>TRUE));
				echo $form->input('TJURUSAN_ID', array("type"=>"select","options"=>$tjurusans,'empty'=>'--Pilih Jurusan--','label'=>'Jurusan'));
				echo $form->input('TPROGRAM_ID', array("type"=>"select","options"=>$jenjang_studi,'empty'=>'--Pilih Jenjang Studi--','label'=>'Jenjang Studi'));
				
				//hidden
				
				echo $form->hidden('JENIS_KELAMIN',array('label'=>'Jenis Kelamin','value'=>$row['TcalonMahasiswa']['JENIS_KELAMIN'],'options' => array('L'=>'L','P'=>'P')));
				echo $form->hidden('AGAMA',array('label'=>'Agama','value'=>$row['TcalonMahasiswa']['AGAMA']));
				echo $form->hidden('TGL_LAHIR',array('label'=>'Tanggal Lahir','value'=>$row['TcalonMahasiswa']['TGL_LAHIR'],'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
				echo $form->hidden('TELEPON', array('label'=>'No Telepon','value'=>$row['TcalonMahasiswa']['TELEPON']));
				echo $form->hidden('PEKERJAAN', array('label'=>'Pekerjaan','value'=>$row['TcalonMahasiswa']['PEKERJAAN']));
				echo $form->hidden('KOTA', array('label'=>'Kota','value'=>$row['TcalonMahasiswa']['KOTA']));
				echo $form->hidden('KODEPOS', array('label'=>'Kode Pos','value'=>$row['TcalonMahasiswa']['KODEPOS']));

				echo $form->hidden('NAMA_SMU', array('label'=>'Nama SMU','value'=>$row['TcalonMahasiswa']['NAMA_SMU']));
				echo $form->hidden('JURUSAN_SMU', array('label'=>'Jurusan SMU ','value'=>$row['TcalonMahasiswa']['JURUSAN_SMU'],"type"=>"select",'empty'=>'--Pilih Jurusan--',"options"=>array("SMA_A1"=>"SMA A1","SMA_A2"=>"SMA A2","SMA_A3"=>"SMA A3","SMA_A4"=>"SMA A4","SMUIPA"=>"SMA IPA","SMA_IPS"=>"SMA IPS")));
				echo $form->hidden('THN_LULUS', array('label'=>'Tahun Lulus','value'=>$row['TcalonMahasiswa']['THN_LULUS']));
				echo $form->hidden('nem', array('label'=>'Nem','value'=>$row['TcalonMahasiswa']['nem']));

		
				echo $form->hidden('NAMA_ORTU', array('label'=>'Nama','value'=>$row['TcalonMahasiswa']['NAMA_ORTU']));
				echo $form->hidden('ALAMAT_ORTU', array('label'=>'Alamat','value'=>$row['TcalonMahasiswa']['ALAMAT_ORTU']));
				echo $form->hidden('KOTA_ORTU', array('label'=>'Kota','value'=>$row['TcalonMahasiswa']['KOTA_ORTU']));
				echo $form->hidden('KODEPOS_ORTU', array('label'=>'Kode Pos','value'=>$row['TcalonMahasiswa']['KODEPOS_ORTU']));
				echo $form->hidden('TELEPON_ORTU', array('label'=>'Telepon','value'=>$row['TcalonMahasiswa']['TELEPON_ORTU']));
				echo $form->hidden('PEKERJAAN_ORTU', array('label'=>'Pekerjaan','value'=>$row['TcalonMahasiswa']['PEKERJAAN_ORTU']));
				echo $form->hidden('INSTANSI', array('label'=>'Instansi','value'=>$row['TcalonMahasiswa']['INSTANSI']));

				echo $form->hidden('TGL_DAFTAR',array('label'=>'Tanggal','value'=>$row['TcalonMahasiswa']['TGL_DAFTAR'],'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
				//echo $form->hidden("Uang_Pendaftaran",array('type'=>'checkbox','value'=>FALSE,'label'=>'Uang Pendaftaran','checked'=>FALSE));
				//echo $form->hidden("Uang_Seleksi",array('type'=>'checkbox','value'=>FALSE,'label'=>'Uang Seleksi','checked'=>FALSE));
				echo $form->hidden('kenal_stmik', array('label'=>'Kenal STMIK dari','value'=>$row['TcalonMahasiswa']['kenal_stmik'],'options'=>array("SURAT KE RUMAH"=>"SURAT KE RUMAH","SPANDUK DIJALAN"=>"SPANDUK DIJALAN","RADIO"=>"RADIO","TELEVISI"=>"TELEVISI","TEMAN"=>"TEMAN","POSTER DI SEKOLAH"=>"POSTER DI SEKOLAH","TELEPON"=>"TELEPON","LEWAT KAMPUS STMIK"=>"LEWAT KAMPUS STMIK","LAIN-LAIN"=>"LAIN-LAIN")));
				echo $form->hidden('SUMBANGAN', array('label'=>'Sumbangan','value'=>$row['TcalonMahasiswa']['SUMBANGAN']));
				echo $form->hidden('PETUGAS', array('label'=>'Petugas','value'=>$row['TcalonMahasiswa']['PETUGAS']));
		
				//end hidden
				
				echo "<div class='input text required'>";
				echo "<span id='NIM'>";
				echo $form->input('NIM', array('type'=>'text', 'label'=>'NIM', 'div'=>false));
				echo "</span>";
				echo $ajax->submit('Generate',array('url'=>'getnim','update'=>'NIM', 'div'=>FALSE));
				echo "</div>";
				
				
			?>
			</fieldset>
			<hr class="separator" />
			<?php endforeach;?>
			
		<?php
		endif;
		echo $form->end('Simpan');
		/*echo $html->link("Tambah Pembayaran","/tstatus_pembayarans/add/$nim");*/
	}
?>

</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>