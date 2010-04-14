<div class="twaktuses form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Waktu Kuliah');?></span></h2>
<?php echo $form->create('Twaktus');?>
	<fieldset>
	<?php
		echo $form->input('WAKTU_ID',array("label"=>"Id (angka)"));
		echo $form->input('WAKTU_BEGIN',array("label"=>"Waktu mulai"));
		echo $form->input('WAKTU_END',array("label"=>"Waktu selesai"));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Twaktus.AGAMA_ID')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>