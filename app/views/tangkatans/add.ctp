<div class="tangkatans form">
<?php echo $form->create('Tangkatan');?>
	<fieldset>
 		<legend><?php __('Tambah Angkatan');?></legend>
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
		<li><?php echo $html->link(__('List Tangkatans', true), array('action'=>'index'));?></li>
	</ul>
</div>
