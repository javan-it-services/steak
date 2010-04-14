<div class="tmahasiswas view grid_12 alpha" id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Diri Mahasiswa');?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NIM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NO Regsitrasi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NO_REGISTRASI']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dosen Wali'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama'); ?></dt>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Golongan Darah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['GOL_DARAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tanggal Lahir'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TGL_LAHIR']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Warganegara'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['WARGANEGARA']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat Asal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['ALAMAT_ASAL']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telepon Asal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TELEPON']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Alamat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['ALAMAT']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kode Pos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['KODEPOS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telepon'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['TELEPON']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mobile'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['SELULAR']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['EMAIL']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Universitas Asal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['UNIV_ASAL']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Angkatan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<?php if(!empty($pengumumans)):?>
<br/>
<div id='pengumuman'>
<h3>Pengumuman Mata Kuliah</h3>
<table border=1>
<?php foreach($pengumumans as $row):?>
<tr>
<td><?php echo 'Mata Kuliah : '.$row['Tkelase']['KD_KULIAH'].' Kelas : '.$row['Tkelase']['NAMA_KELAS'].' Dosen : '.$row['Tkelase']['TDOSEN_ID']?></td>
</tr>
<tr>
<td><?php echo $row['Tpengumuman']['PENGUMUMAN']?></td>
</tr>
<?php endforeach;?>
<table>
</div>
<?php endif;?>
