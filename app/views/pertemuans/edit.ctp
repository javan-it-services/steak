<div class="pertemuans form grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Pertemuan');?></span></h2>
<?php echo $form->create('Pertemuan');?>
	<fieldset>
	<?php
    echo $form->input('id');
		echo $form->input('pertemuan_ke');
		echo $form->input('tanggal',array('label'=>'Tanggal','type'=>'text', 'class'=>'w8em format-d-m-y divider-dash','value'=>date('d-m-Y')));

		echo $form->input('jam');
        echo $form->input('ruang_id',array('label'=>'Ruang','type'=>'select','options'=>$truangKuliahs));
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
</div>

<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Pertemuan.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>

