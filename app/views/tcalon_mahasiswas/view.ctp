<?php //pr($tmahasiswa); ?>
<div class="tmahasiswas view grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Lengkap Calon Mahasiswa baru No Register : ');echo $id;?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NO_REGISTRASI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Mahasiswa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['NAMA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenis Kelamin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['JENIS_KELAMIN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Agama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tagama']['AGAMA_NAME']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tempat Lahir'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['TEMPAT_LAHIR']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Lahir'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['TGL_LAHIR']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KOTA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
			echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
			echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo $tmahasiswa['TcalonMahasiswa']['KOTA']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['ALAMAT'].", ".$tmahasiswa['TcalonMahasiswa']['KOTA'].", ".$tmahasiswa['TcalonMahasiswa']['KODEPOS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telepon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['TELEPON']; ?>
			&nbsp;
		</dd>
		

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenjang Studi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tprogram']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jurusan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tjurusan']['namaJurusan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Ajaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Photo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
				<img width="100" height="100" src="<?php echo $html->url('/'.$tmahasiswa['TcalonMahasiswa']['PHOTO']) ?> "/>
			&nbsp;
		</dd>
		<br>
		Data Pokok :<br>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pilihan 1 : '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			//pr($tmahasiswa['Tprogram']);
			echo $tmahasiswa['Tprogram']['value']. " &nbsp; ".$tmahasiswa['Tjurusan']['namaJurusan'];
			
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pilihan 2 : '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			
			echo $tmahasiswa['Tprogram2']['value']. " &nbsp; ".$tmahasiswa['Tjurusan2']['namaJurusan'];
			
			?>
			&nbsp;
		</dd>
		<br>
		Data Orang tua :<br>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Orang Tua'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['NAMA_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ALAMAT :'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['ALAMAT_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KOTA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['KOTA_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KODE POS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['KODEPOS_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TELEPON'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['TELEPON_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PEKERJAAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['PEKERJAAN_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('INSTANSI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['INSTANSI']; ?>
			&nbsp;
		</dd>
		<br>
		Data SMU :<br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA SMU'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['NAMA_SMU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JURUSAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['JURUSAN_SMU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Lulus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['THN_LULUS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NEM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['nem']; ?>
			&nbsp;
		</dd>
		<br>Pendaftaran</br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TANGGAL DAFTAR'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['TGL_DAFTAR']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pembayaran yang sudah di Bayar : '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			echo "<br>"; 
			if ($tmahasiswa['TcalonMahasiswa']['Uang_Pendaftaran']=="1"){
				echo "Uang Pendaftaran<br>";
			}elseif($tmahasiswa['TcalonMahasiswa']['Uang_Seleksi']=="1"){
				echo "Uang Seleksi<br>";
			}else{
				echo "Belum ada Pembayaran yang dipilih<br>";
			}
				
			 ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kenal STMIK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['kenal_stmik']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sumbangan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['SUMBANGAN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PETUGAS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['PETUGAS']; ?>
			&nbsp;
		</dd>
		<br>Data Test masuk </br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ruang Test'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['ruang_test']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Test'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['tanggal_test']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nilai Matematika'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['nilai_matematika']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nilai Kemampuan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['nilai_kemampuan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nilai Bahasa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['nilai_bahasa']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nilai Rata-rata'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TcalonMahasiswa']['nilai_rata2']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<p><hr></p>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ubah Calon Mahasiswa', true), array('action'=>'edit', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI'])); ?> </li>
		<li><?php echo $html->link(__('Hapus Calon Mahasiswa', true), array('action'=>'delete', $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tmahasiswa['TcalonMahasiswa']['NO_REGISTRASI'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Daftar Calon Mahasiswa', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Calon Mahasiswa', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
</div>
