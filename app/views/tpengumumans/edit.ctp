<div class="tpengumumans index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Pengumuman');?></span></h2>
<?php echo $form->create('Tpengumuman',array('url'=>'/tpengumumans/edit'));?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('tkelase_id',array('label'=>"Kelas Mata Kuliah"));
		echo $form->input('tanggal_mulai',array('label'=>'Tanggal Mulai','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $form->input('TGL_BERAKHIR',array('label'=>'Tanggal Berakhir','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $tinymce->input('PENGUMUMAN',array("label"=>"Isi Berita"), array( 
          'theme'                             => 'advanced',
          'theme_advanced_toolbar_location'   => 'top',
          'theme_advanced_toolbar_align'      => 'left',
          'theme_advanced_statusbar_location' => 'bottom'));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tpengumuman.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
