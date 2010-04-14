<div class="tsemester form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Semester');?></span></h2>
<?php echo $form->create('Tsemester');?>
	<fieldset>
	<?php
		echo $form->input('ID');
		echo $form->input('NAME', array('label'=>'Nama'));
		echo $form->input('DESC', array('label'=>'Deskripsi'));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tsemester.ID')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>

