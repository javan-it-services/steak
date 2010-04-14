<div class="tmahasiswas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Cari No. Registrasi untuk daftar Ulang');?></span></h2>

<?php echo $form->create('Filter', array('url'=>'/tcalonMahasiswas/cari_no_test', 'class'=>'filter'))?>
<table class="filter">
	<tr>
		<td>
			<?php echo $form->input('NO_REGISTRASI', array('label'=>'NO REGISTRASI', 'div'=>'filter', 'fieldset'=>false))?>
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
	if(isset($error2)){
		echo "<p>$error2</p>";
		$payments = "";
	}
	if(isset($payments)){		
		if(!empty($payments)):?>
		<?php foreach($payments as $row):?>
		
		<?php echo $form->create('Tmahasiswas',array('url'=>'/tmahasiswas/add','class'=>'plain', "type"=>"file"));?>
			<fieldset> Pribadi
			<?php
				echo $form->input('NO_REGISTRASI', array('label'=>'No Registrasi','value'=>$row['TcalonMahasiswa']['NO_REGISTRASI'],'ReadOnly'=>TRUE));
				echo $form->input('NAMA', array('label'=>'Nama','value'=>$row['TcalonMahasiswa']['NAMA'],'ReadOnly'=>TRUE));
				echo $form->input('ALAMAT', array('label'=>'Alamat','value'=>$row['TcalonMahasiswa']['ALAMAT'],'ReadOnly'=>TRUE));
                                echo $form->input('JUR2', array('label'=>'Prog/Jurusan','value'=>$jurusan['Refdetil']['value']. " - " . $jurusan['Tjurusan']['namaJurusan'],'ReadOnly'=>TRUE));
                                echo $form->input('ALAMAT', array('label'=>'Kelas','value'=>$row['Refkela']['nama'],'ReadOnly'=>TRUE));
                              echo $form->hidden('JUR', array('value'=>$jurusan['Tjurusan']['kodejurusan'],'ReadOnly'=>TRUE));

				
				//hidden
				
				echo $form->hidden('JENIS_KELAMIN',array('label'=>'Jenis Kelamin','value'=>$row['TcalonMahasiswa']['JENIS_KELAMIN'],'options' => array('L'=>'L','P'=>'P')));
				echo $form->hidden('AGAMA',array('label'=>'Agama','value'=>$row['TcalonMahasiswa']['AGAMA']));
				echo $form->hidden('TEMPAT_LAHIR',array('label'=>'Agama','value'=>$row['TcalonMahasiswa']['TEMPAT_LAHIR']));
				echo $form->hidden('TGL_LAHIR',array('label'=>'Tanggal Lahir','value'=>$row['TcalonMahasiswa']['TGL_LAHIR'],'type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
				echo $form->hidden('TELEPON', array('label'=>'No Telepon','value'=>$row['TcalonMahasiswa']['TELEPON']));
				echo $form->hidden('PEKERJAAN', array('label'=>'Pekerjaan','value'=>$row['TcalonMahasiswa']['PEKERJAAN']));
				echo $form->hidden('KOTA', array('label'=>'Kota','value'=>$row['TcalonMahasiswa']['KOTA']));
				echo $form->hidden('KODEPOS', array('label'=>'Kode Pos','value'=>$row['TcalonMahasiswa']['KODEPOS']));
				echo $form->hidden('refkela_id',array('value'=>$row['TcalonMahasiswa']['refkelas_id']));
				
				echo $form->hidden('NAMA_SMU', array('label'=>'Nama SMU','value'=>$row['TcalonMahasiswa']['NAMA_SMU']));
				echo $form->hidden('JURUSAN_SMU', array('label'=>'Jurusan SMU ','value'=>$row['TcalonMahasiswa']['JURUSAN_SMU'],"type"=>"select",'empty'=>'--Pilih Jurusan--',"options"=>array("SMA_A1"=>"SMA A1","SMA_A2"=>"SMA A2","SMA_A3"=>"SMA A3","SMA_A4"=>"SMA A4","SMUIPA"=>"SMA IPA","SMA_IPS"=>"SMA IPS")));
				echo $form->hidden('THN_LULUS', array('label'=>'Tahun Lu lus','value'=>$row['TcalonMahasiswa']['THN_LULUS']));
				echo $form->hidden('nem', array('label'=>'Nem','value'=>$row['TcalonMahasiswa']['nem']));
				echo $form->hidden('gelombang_id', array('label'=>'Nem','value'=>$row['TcalonMahasiswa']['gelombang_id']));
		
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
				echo $form->hidden('PHOTO', array('label'=>'Petugas','value'=>$row['TcalonMahasiswa']['PHOTO']));
				//end hidden
				
			?>
			</fieldset>
			
			<hr class="separator" />
			<fieldset>
<div class="box report">
        <div class="spacer">
			<table class="report">
			<thead>
				<tr>
					<th>Kewajiban</th>
					<th>Jumlah</th>
				</tr>
			</thead>
				<?php
					foreach($listKewajiban as $list):
				?>
			<tbody>
				<tr>
					<td>
						<?php echo $list['KeuanganMaster']['nama']; ?>
					</td>
					<td>
						<?php echo $list['Kewajiban']['jumlah']; ?>
					</td>
				</tr>
			</tbody>	
				<?php endforeach;?>
				<tr>
					<td>Diskon</td>
					<td> <?php echo $form->input('diskon',array('label'=>FALSE));?> </td>
				</tr>
			</table>
            	</div>
	</div>
			</fieldset>
			<hr class="separator" />
			<fieldset>
				<?php
				echo "<p align='center'>";
				
				echo "</p>";
				echo "<div class='input text required'>";
				echo "<span id='NIM'>";
				echo $form->hidden('NO_REGISTRASI', array('value'=>$row['TcalonMahasiswa']['NO_REGISTRASI']));
				echo $form->input('NIM', array('type'=>'text', 'label'=>'NIM', 'div'=>false));
				echo "</span>";
				echo $ajax->submit('Generate',array('url'=>'getnim','update'=>'NIM', 'div'=>FALSE));
				echo "</div>";
				echo "<br>";
				if(isset($error)){
					echo $error;
				}
				?>
				</fieldset>
					<hr class="separator" />				
					<div id='NIM'>
						<? //echo $nim; ?>
					</div>	
			
			
		<?php
		endforeach;
                	echo $form->end('Simpan');
		endif;
		
		/*echo $html->link("Tambah Pembayaran","/tstatus_pembayarans/add/$nim");*/
		
	}
?>
<?php //endforeach;?>

</div>
</div>
<div class="grid_4 omega" id="sidebar">

</div>