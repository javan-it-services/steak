<div class="tdosens form grid_12 alpha" id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Dosen');?></span></h2>
		<?php echo $form->create('Tdosen',array("type"=>"file"));?>
			<fieldset>
			<?php
				echo $form->input('NIP_DOSEN', array('type'=>'text', 'label'=>'NIP'));
				echo $form->input('NIDN');
				echo $form->input('NAMA_DOSEN',array("label"=>"Nama Dosen"));
				echo $form->input('INISIAL',array("label"=>"Inisial"));
				echo $form->input('AGAMA',array("label"=>"Agama", "type"=>"select", "options"=>$tagamas));
				echo $form->input('JENIS_KELAMIN',array('options' => array('L'=>'L','P'=>'P'),"label"=>"Jenis Kelamin"));
				echo $form->input('status_aktivitas_id', array("type"=>"select","options"=>$status_aktivitas,'empty'=>'-Pilih-','label'=>'Status Aktivitas'));
				echo $form->input('status_kerja_id', array("type"=>"select","options"=>$status_kerja_dosen,'empty'=>'-Pilih-','label'=>'Status Kerja'));
				echo $form->input('jabatan_akademik_id', array("type"=>"select","options"=>$jabatan_akademik,'empty'=>'-Pilih-','label'=>'Jabatan Akademik'));
				echo $form->input('pendidikan_tertinggi_id', array("type"=>"select","options"=>$pendidikan_tertinggi,'empty'=>'-Pilih-','label'=>'Pendidikan Tertinggi'));

			?>
			</fieldset>
			<hr class="separator" />
			<fieldset>
			<?php

				echo $form->input('INSTANSI_ASAL',array("label"=>"Instansi Asal"));
				echo $form->input('ALAMAT_INSTANSI',array("label"=>"Alamat Instansi", 'type'=>'textare'));
				echo $form->input('KD_PROP_INSTANSI', array("label"=>'Propinsi Instansi',"type"=>"select","id"=>"KD_PROP1","options"=>$tpropinsis,'empty'=>'-pilih-'));
				echo $ajax->observeField('KD_PROP1', array ("url"=>'/Tdosens/getkabupateninstansi','update'=>'daftar_kab'));
				echo "<div class='input text' id='daftar_kab'>";
				echo $form->label("Kab Instansi");
				echo $form->select('KD_KAB_INSTANSI',$tkabupatens);
				echo "</div>";
				echo $form->input('ALAMAT_RUMAH',array("label"=>"Alamat Rumah"));
				echo $form->input('KD_PROP_RUMAH', array("label"=>'Propinsi Rumah',"type"=>"select","id"=>"KD_PROP2","options"=>$tpropinsis,'empty'=>'-pilih-'));
				echo $ajax->observeField('KD_PROP2', array ("url"=>'/Tdosens/getkabupatenrumah','update'=>'daftar_kabrumah'));
				echo "<div class='input text' id='daftar_kabrumah'>";
				echo $form->label("Kab Rumah");
				echo $form->select('KD_KAB_RUMAH',$tkabupatens);
				echo "</div>";
				echo $form->input('TELEPON',array("label"=>"Telepon"));
				echo $form->input('SELULAR',array("label"=>"Seluler"));
				echo $form->input('FAXIMILE',array("label"=>"Fax"));
				echo $form->input('EMAIL',array("label"=>"Email"));
				echo $form->input('EMAIL_2',array("label"=>"Email 2"));
				echo $form->input('SARJANA',array("label"=>"Sarjana"));
				echo $form->input('MASTER',array("label"=>"Master"));
				echo $form->input('DOKTOR',array("label"=>"Doktor"));
				echo $form->input('CV_SINGKAT',array("label"=>"CV Singkat"));
				echo "<div class='input text'>";
				echo $form->label("Pangkat");
				echo $form->select('PANGKAT',$tpangkats);
				echo "</div>";
				echo $form->input('SUAMI_ISTRI',array("label"=>"Suami/Istri"));
				echo $form->input('JUMLAH_ANAK',array("label"=>"Jumlah Anak"));
				echo $form->input('MASA_KONTRAK',array("label"=>"Masa Kontrak"));
				echo $form->input('ACCOUNT_BANK',array("label"=>"Account Bank"));
				echo $form->input('MINAT_MENGAJAR',array("label"=>"Minat Mengajar"));
				echo $form->input('MINAT_RISET',array("label"=>"Minat Riset"));
				echo $form->input('ASURANSI',array("label"=>"Asuransi"));
				echo $form->input('RIWAYAT_MENGAJAR',array("label"=>"Riwayat Mengajar"));
				echo $form->input('RIWAYAT_KERJA',array("label"=>"Riwayat Kerja"));
				echo $form->input('MOTTO',array("label"=>"Motto"));
				echo "<div class='input text'>";
				echo $form->label("Photo");
				echo $form->create('Tdosen', array("action"=>"add", "type"=>"file"));
				echo $form->file("file_foto",array("onChange"=>"tampil(this.form);"));
				echo "</div>";
			?>
			<div class='input text'>
			<iframe id="upload_target" width="20%" name="upload_target" src="#" style="width:100;height:100;border:1;solid #fff;"></iframe>
			</div>


			</fieldset>
		<?php echo $form->end('Simpan');?>

			<script type="text/javascript">
				function tampil($form){
					$form.target = "upload_target";
					$form.action = "<?php echo $html->url("/tdosens/upload");?>";
					$form.submit();
					$form.target ="";
					$form.action = "<?php echo $html->url("/tdosens/add");?>";

				}
			</script>
	</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
		<ul>
			<li><?php echo $html->link(__('Lihat Data Dosen', true), array('action'=>'index'),array('class'=>'tombol'), null, false); ?></li>
		</ul>
	</div>
</div>
