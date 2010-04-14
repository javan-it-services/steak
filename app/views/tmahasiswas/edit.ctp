<div class="tmahasiswas form grid_16" id="content" >
	<div class="box">

		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Data Mahasiswa dengan NIM : ');echo $id;?></span></h2>
	<?php echo $form->create('Tmahasiswa',array('class'=>'plain', "type"=>"file"));?>
			<fieldset> Pribadi
			<?php
				
				echo $form->input('NAMA', array('label'=>'Nama'));
				echo $form->input('ALAMAT', array('label'=>'Alamat'));
				echo $form->input('JENIS_KELAMIN',array('label'=>'Jenis Kelamin','options' => array('L'=>'L','P'=>'P')));
				echo $form->input('AGAMA',array('label'=>'Agama','options' => $tagamas));
				echo $form->input('TGL_LAHIR',array('label'=>'Tanggal Lahir','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
				echo $form->input('TELEPON', array('label'=>'No Telepon'));
				echo $form->input('KOTA', array('label'=>'Kota'));
				echo $form->input('KODEPOS', array('label'=>'Kode Pos'));
				
				
			?>
			</fieldset>
			<hr class="separator" />
			<fieldset>Perguruan Tinggi Asal (Jika Pindahan)
			<?php
				echo "<br>";
                                echo $form->input('UNIV_ASAL',array('label'=>'Universitas Asal','options' => $tperguruan,'empty'=>'-- Pilih Universitas Asal --'));
				echo $form->input('JURUSAN_ASAL', array('label'=>'Jurusan '));
				//echo $form->input('ALAMAT_ASAL', array('label'=>'Alamat '));
				//echo $form->input('KOTA_ASAL', array('label'=>'Kota'));
			?>
			</fieldset>
			<hr class="separator" />
			<fieldset> SMU
			<?php
				echo $form->input('NAMA_SMU', array('label'=>'Nama SMU '));
				echo $form->input('JURUSAN_SMU', array('label'=>'Jurusan SMU ',"type"=>"select",'empty'=>'--Pilih Jurusan--',"options"=>array("SMA_A1"=>"SMA A1","SMA_A2"=>"SMA A2","SMA_A3"=>"SMA A3","SMA_A4"=>"SMA A4","SMUIPA"=>"SMA IPA","SMA_IPS"=>"SMA IPS")));
				echo $form->input('THN_LULUS', array('label'=>'Tahun Lulus'));
				echo $form->input('nem', array('label'=>'Nem'));

			?>
			</fieldset>
			<hr class="separator" />
			<fieldset> Orang Tua
			<?php
				echo $form->input('NAMA_ORTU', array('label'=>'Nama'));
				echo $form->input('ALAMAT_ORTU', array('label'=>'Alamat'));
				echo $form->input('KOTA_ORTU', array('label'=>'Kota'));
				echo $form->input('KODEPOS_ORTU', array('label'=>'Kode Pos'));
				echo $form->input('TELEPON_ORTU', array('label'=>'Telepon'));
				echo $form->input('PEKERJAAN_ORTU', array('label'=>'Pekerjaan'));
				echo $form->input('INSTANSI', array('label'=>'Instansi'));

			?>
			</fieldset>
			<hr class="separator" />
			<fieldset> Pekerjaan
			<?php
				echo $form->input('NAMA_PEKERJAAN', array('label'=>'Nama Pekerjaan'));
				echo $form->input('NAMA_PERUSAHAAN', array('label'=>'Nama Perusahaan '));
				echo $form->input('ALAMAT_KERJA', array('label'=>'Alamat '));
				echo $form->input('KOTA_KERJA', array('label'=>'Kota'));
			?>
			</fieldset>
			<hr class="separator" />
			
						<script type="text/javascript">
				function tampil($form){
					$form.target = "upload_target";
					$form.action = "<?php echo $html->url("/tmahasiswas/upload");?>";
					$form.submit();
					$form.target ="";
					$form.action = "<?php echo $html->url("/tmahasiswas/add");?>";

				}
			</script>
		<?php echo $form->end('Simpan');?>
	</div>
</div>
<!--<div class="actions">-->
<!--	<ul>-->
<!--		<li><?php echo $html->link(__('Lihat Daftar Mahasiswa', true), array('action'=>'index'));?></li>-->
<!--	</ul>-->
<!--</div>-->
