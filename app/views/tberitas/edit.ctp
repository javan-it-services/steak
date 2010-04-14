<div class="tberitas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Edit Berita');?></span></h2>
<?php echo $form->create('Tberita');?>
	<fieldset>
	<?php
		echo $form->input('id');
		echo $form->input('JUDUL_BERITA',array("label"=>"Judul"));
		echo $form->input('START_VALID_BERITA',array('label'=>'Valid Sejak','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $form->input('END_VALID_BERITA',array('label'=>'Valid Sampai','type'=>'text', 'class'=>'w8em format-y-m-d divider-dash'));
		echo $form->input('RINGKASAN',array("label"=>"Ringkasan"));
         echo $tinymce->input('ISI_BERITA',array("label"=>"Isi Berita"), array( 
          'theme'                             => 'advanced',
          'theme_advanced_toolbar_location'   => 'top',
          'theme_advanced_toolbar_align'      => 'left',
          'theme_advanced_statusbar_location' => 'bottom'));
          
          echo $form->input('created',array("type"=>"hidden","value"=>date('Y-m-d')));		
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
	</div>
</div>


<div class="grid_4 omega" id="sidebar">
	<div class="sidebox special">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tberita.id')), array('class'=>'tombol minus'), "Anda yakin ?", false); ?></li>
	</ul>
	</div>
</div>
