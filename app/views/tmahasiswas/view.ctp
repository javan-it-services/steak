<?php //pr($tmahasiswa); ?>
<div class="tmahasiswas view grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Lengkap Calon Mahasiswa baru NIM : ');echo $id;?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NIM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Mahasiswa'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NAMA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jenis Kelamin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['JENIS_KELAMIN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Agama'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tagama']['AGAMA_NAME']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Lahir'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TGL_LAHIR']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KOTA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
			echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";
			echo "&nbsp;";echo "&nbsp;";echo "&nbsp;";echo $tmahasiswa['Tmahasiswa']['KOTA']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['ALAMAT'].", ".$tmahasiswa['Tmahasiswa']['KOTA'].", ".$tmahasiswa['Tmahasiswa']['KODEPOS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telepon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TELEPON']; ?>
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
				<img width="100" height="100" src="<? echo $html->url('/'.$tmahasiswa['Tmahasiswa']['PHOTO']) ?> "/>
			&nbsp;
		</dd>
		<br>
		Data Pekerjaan :<br>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Pekerjaan '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			
			echo $tmahasiswa['Tmahasiswa']['NAMA_PEKERJAAN'];
			
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Perusahaan '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			
			echo $tmahasiswa['Tmahasiswa']['NAMA_PERUSAHAAN'];
			
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat Pekerjaan '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			
			echo $tmahasiswa['Tmahasiswa']['ALAMAT_KERJA'];
			
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kota '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php 
			
			echo $tmahasiswa['Tmahasiswa']['KOTA_KERJA'];
			
			?>
			&nbsp;
		</dd>
		<br>
		Data Orang tua :<br>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Orang Tua'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NAMA_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ALAMAT :'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['ALAMAT_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KOTA'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['KOTA_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KODE POS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['KODEPOS_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TELEPON'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TELEPON_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PEKERJAAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['PEKERJAAN_ORTU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('INSTANSI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['INSTANSI']; ?>
			&nbsp;
		</dd>
		<br>
		Data SMU :<br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NAMA SMU'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NAMA_SMU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('JURUSAN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['JURUSAN_SMU']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Lulus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['THN_LULUS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NEM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['nem']; ?>
			&nbsp;
		</dd>
		<br>Perguruan Tinggi(PT) Asal</br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Universitas Asal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tperguruan_tinggi']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jurusan Asal : '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['JURUSAN_ASAL']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat: '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tperguruan_tinggi']['alamat']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kota : '); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tperguruan_tinggi']['kota']; ?>
			&nbsp;
		</dd>
		<br>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kenal STMIK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['kenal_stmik']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<p><hr></p>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Ubah Calon Mahasiswa', true), array('action'=>'edit', $tmahasiswa['Tmahasiswa']['NO_REGISTRASI'])); ?> </li>
		<li><?php echo $html->link(__('Hapus Calon Mahasiswa', true), array('action'=>'delete', $tmahasiswa['Tmahasiswa']['NO_REGISTRASI']), null, sprintf(__('Are you sure you want to delete # %s?', true), $tmahasiswa['Tmahasiswa']['NO_REGISTRASI'])); ?> </li>
		<li><?php echo $html->link(__('Lihat Daftar Calon Mahasiswa', true), array('action'=>'index')); ?> </li>
		<li><?php echo $html->link(__('Tambah Calon Mahasiswa', true), array('action'=>'add')); ?> </li>
	</ul>
</div>
</div>
