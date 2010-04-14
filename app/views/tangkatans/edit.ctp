<div class="tangkatans form">
<?php echo $form->create('Tangkatan');?>
	<fieldset>
 		<legend><?php __('Edit Tangkatan');?></legend>
	<?php
		echo "<div class='input text'>";
		echo $form->label("ANGKATAN");
		echo $form->text('ANGKATAN');
		echo "</div>";
	echo "<div class='input text'>";
		echo $form->label("SEMESTER");
		echo $form->select('SEM',$tsemesters);
		echo "</div>";
		
		//echo $form->input('SEM');
		echo $form->input('THN');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Hapus', true), array('action'=>'delete', $form->value('Tangkatan.y')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Tangkatan.y'))); ?></li>
		<li><?php echo $html->link(__('Lihat daftar Angkatan', true), array('action'=>'index'));?></li>
	</ul>
</div>
