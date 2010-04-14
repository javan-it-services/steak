<?php
	$html->tags['checkboxmultiplestart'] = '<div class="checkboxmultiple">';
	$html->tags['checkboxmultipleend'] = '</div>';
?>

<div class="tberitas index grid_12 alpha " id="content">
	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Modul Utama');?></span></h2>
		<?php echo $form->create('Link',array('url'=>'/menu/add'));?>
			<fieldset>
			<?php
				echo $form->input('name',array('type'=>'text', 'label'=>'Label'));
				echo $form->input('path',array('type'=>'select','options'=>$listMenu));
				echo $form->input('Group',array('multiple'=>'checkbox','options'=>$listGroup,'label'=>FALSE));
			?>
			</fieldset>
		<?php echo $form->end('Simpan');?>
	</div>

	<div class="box">
		<h2 class="section_name"><span class="section_name_span"><?php __('Tambah Sub Modul');?></span></h2>
		<?php echo $form->create('Link',array('url'=>'/menu/add/sub'));?>
			<fieldset>
			<?php
				echo $form->input('parent_id',array('type'=>'select','options'=>$listParent,'label'=>'Modul'));
				echo $form->input('name',array('type'=>'text', 'label'=>'Label'));
				echo $form->input('path',array('type'=>'select','options'=>$listMenu));
				echo $form->input('Group',array('multiple'=>'checkbox','options'=>$listGroup,'label'=>FALSE));
				echo $form->input('is_show',array('type'=>'checkbox', 'label'=>'Tampilkan di daftar menu'));
			?>
			</fieldset>
		<?php echo $form->end('Simpan');?>
	</div>

<div class="grid_4 omega" id="sidebar">

</div>
