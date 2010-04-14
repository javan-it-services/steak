<div class="ttahun_ajarans form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Tahun Ajaran');?></span></h2>
<?php echo $form->create('TtahunAjaran');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('nama', array ('label'=>'Tahun Ajaran'));
		echo $form->input('kodeAngkatan', array ('label'=>'Kode Angkatan'));
		echo $form->input('biaya', array ('label'=>'Biaya Kuliah'));
		echo $form->input('persks', array ('label'=>'Biaya Per SKS'));
		echo $form->input('skspaket', array ('label'=>'Paket SKS'));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Ttahunajaran.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>

