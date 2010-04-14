<div class="tagamas form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Jurusan');?></span></h2>
<?php echo $form->create('Tjurusan');?>
	<fieldset>
 	<?php
		echo $form->input('kodejurusan',array("label"=>"Kode Jurusan","type"=>"text", "readonly"=>"readonly"));
		echo $form->input('namaJurusan');
		echo $form->input('descJurusan',array("label"=>"Keterangan"));
		echo $form->input('fakultas',array("type"=>"select","options"=>$tfakultases));
		echo $form->input('program_studi_id',array("type"=>"select","options"=>$tprograms, "label"=>__("Jenjang Studi", true)));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tjurusan.kodejurusan')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
