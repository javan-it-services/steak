<?php
    $changeOptions = array(
                           "url"=>"/penilaian/getMahasiswaByKelas/".$kelas['Tkelase']['ID']
                           ,"update"=>"list_mahasiswa"
                           );
?>

<div class="tmahasiswas grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Nilai Mahasiswa');?></span></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mata Kuliah'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $html->link($kelas['Tmatakuliah']['NAMA_KULIAH']." (".$kelas['Tmatakuliah']['NAMA_KULIAH_ENG'].")","/Tmatakuliahs/view/".$kelas['Tmatakuliah']['KD_KULIAH']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KELAS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tkelase']['NAMA_KELAS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('SKS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tmatakuliah']['SKS']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('PERIODE'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tsemester']['DESC']; ?> <?php echo $kelas['TtahunAjaran']['nama']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('DOSEN'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $kelas['Tdosen']['NAMA_DOSEN']; ?>
			&nbsp;
		</dd>

		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('KOMPONEN NILAI'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
            <?php echo $form->create("",array("id"=>"frmKomponen")); ?>
            <?php echo $form->input("KomponenNilai.id", array("id"=>"komponen","label"=>false, "div"=>false,"type"=>"select", "options"=>$listKomponenNilai,"empty"=>"-Pilih-")); ?>
			<?php echo $javascript->codeBlock("$('frmKomponen').reset()") ?>
            <?php echo $ajax->observeField("komponen",$changeOptions); ?>
            <?php echo $form->end() ?>
		</dd>

	</dl>
<p>

<div id="list_mahasiswa"></div>
</div>
</div>