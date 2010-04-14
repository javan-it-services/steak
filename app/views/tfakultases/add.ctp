<div class="tfakultases form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Fakultas');?></span></h2>

<?php echo $form->create('Tfakultase');?>
	<fieldset>
	<?php
		echo $form->input('id',array('type'=>'text','label'=>'Kode'));
		echo $form->input('kode',array('label'=>'Singkatan'));
		echo $form->input('nama',array("label"=>"Nama (Bahasa Indonesia)"));
		echo $form->input('nama_en',array("label"=>"Nama (Bahasa Inggris)"));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">

</div>
