<div class="tfakultases form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Fakultas');?></span></h2>
<?php echo $form->create('Tfakultase');?>
	<fieldset>

	<?php
		echo $form->input('id',array('type'=>'text','label'=>'Kode', "readonly"=>"readonly"));
		echo $form->input('kode',array('label'=>__('Singkatan', true)));
		echo $form->input('nama',array("label"=>__("Nama (Bahasa Indonesia)", true)));
		echo $form->input('nama_en',array("label"=>"Nama (Bahasa Inggris)"));
	?>
	</fieldset>
<?php echo $form->end(__('Simpan', true));?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tfakultase.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
