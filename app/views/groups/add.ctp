<?php
	$html->tags['checkboxmultiplestart'] = '<div class="checkboxmultiple">';
	$html->tags['checkboxmultipleend'] = '</div><div class="clear">&nbsp;</div>';
?>
<div class="groups form">
<h2 class="section_name"><span class="section_name_span">Edit Grup</span></h2>
<?php echo $form->create('Group');?>
	<fieldset>
	<?php
		echo $form->input('name');
        echo "<strong style='padding-left:20px'>Hak Akses</strong>";
		echo $form->input('Link', array('multiple'=>'checkbox', 'div' => false, 'label' =>false));
	?>
	</fieldset>
<?php echo $form->end('Simpan');?>
</div>
