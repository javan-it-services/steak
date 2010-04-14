<div class="tagamas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('View Matakuliah');?></span></h2>

	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kode Matakuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KD_KULIAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Matakuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['NAMA_KULIAH']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nama Matakuliah Eng'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['NAMA_KULIAH_ENG']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fakultas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tfakultase']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Program Studi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['JenjangStudi']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Jurusan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tjurusan']['namaJurusan']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sifat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['SIFAT']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['SKS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tahun Kurikulum'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tkurikulum']['nama']; ?>
			&nbsp;
		</dd>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Dibuka'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['IS_BUKA']?"Ya":'Tidak'; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KBK'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KBK']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Konsentrasi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['KONSENTRASI']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Deskripsi'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmatakuliah['Tmatakuliah']['DESKRIPSI']; ?>
			&nbsp;
		</dd>
	</dl>




<?php if(!empty($pengumumans)):?>
<br/>
<? print_r($pengumumans); ?>
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
</div>
</div>
</div>
