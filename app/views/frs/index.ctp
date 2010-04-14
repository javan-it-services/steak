<?php //pr($kartuStudis); ?>
<div class="frs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Data Diri');?></span></h2>

	<?php if(!empty($tmahasiswa)):?>
	<dl><?
 $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NIM'); ?></dt>

		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $tmahasiswa['Tmahasiswa']['NIM']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('NO Registrasi'); ?></dt>
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
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status Pembayaran'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if(!empty($sisa))
			echo "Belum Lunas";
			else
			echo "<span class='negatif'>Lunas</span>"; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status FRS'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
					if (empty($kartuStudis)){
						echo "<span class='negatif'>belum input FRS</span>";
					}else{
						echo $kartuStudis[0]['FormStudi']['status'];
					}
			?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catatan'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php
					if (empty($kartuStudis)){
						echo "<span class='negatif'>belum Isi FRS</span>";
					}elseif(empty($kartuStudis[0]['FormStudi']['frs_notes'])){
						echo "<span class='negatif'>Belum di verifikasi</span>";
					}else{
						echo $kartuStudis[0]['FormStudi']['frs_notes'];
					}
			?>

			&nbsp;
		</dd>

	</dl>
</fieldset>

<?php

if(!empty($kartuStudis) || empty($sisa))
	echo $html->link(__('Pilih Mata Kuliah', true), array('action'=>'registrasi'));?>

<center><h3>Form Rencana Studi</h3></center>
	<?
		echo $form->create("frs", array('url'=>'/frs/pdf'));
	?>
<div id="list_frs">
	<?
		echo $this->element("frs/list");
	?>
</div>
 <?
  echo $form->end();
  ?>
<?
else:
echo "<p>Data Diri tidak ditemukan</p>";
endif;?>
