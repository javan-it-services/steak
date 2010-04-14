<div class="truang_kuliahs index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Ruang Kuliah');?></span></h2>
<?php echo $form->create('TruangKuliah');?>
	<fieldset>
	<?php
		echo $form->hidden('RUANG_ID');
		echo $form->input('RUANG_NAME', array ('label'=>'Nama Ruang'));
		echo $form->input('LOKASI', array ('label'=>'Lokasi',"type"=>"textarea"));
		echo $form->input('KAPASITAS', array ('label'=>'Kapasitas'));
		echo $form->input('FASILITAS', array ('label'=>'Fasilitas'));
		echo $form->input('RUANG_DESC', array ('label'=>'Keterangan'));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('TruangKuliah.RUANG_ID')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
