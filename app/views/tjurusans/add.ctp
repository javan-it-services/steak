<div class="tjurusans form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Jurusan');?></span></h2>
<?php echo $form->create('Tjurusan');?>
	<fieldset>
	<?php
		echo $form->input('kodejurusan',array("label"=>"Kode Jurusan","type"=>"text"));
		echo $form->input('namaJurusan',array("label"=>"Nama Jurusan","type"=>"text"));
		echo $form->input('descJurusan',array("label"=>"Keterangan"));
		echo $form->input('fakultas',array("type"=>"select","options"=>$tfakultases));
		echo $form->input('program_studi_id',array("type"=>"select","options"=>$tprograms, "label"=>__("Jenjang Studi", true)));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">

</div>
